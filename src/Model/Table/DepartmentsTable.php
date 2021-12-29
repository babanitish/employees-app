<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Departments Model
 *
 * @method \App\Model\Entity\Department newEmptyEntity()
 * @method \App\Model\Entity\Department newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Department[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Department get($primaryKey, $options = [])
 * @method \App\Model\Entity\Department findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Department patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Department[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Department|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Department saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Department[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Department[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Department[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Department[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DepartmentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
        
        
        $this->setTable('departments');
        $this->setDisplayField('dept_no');
        $this->setPrimaryKey('dept_no');
      
        $this->belongsToMany('Employees', [
            'through'=>'dept_emp',
            'foreignKey'=>'dept_no',
        ]);
        
        $this->belongsToMany('Managers', [
            'className' => 'Employees',
            'through' => 'DeptManager',
            'foreignKey'=>'dept_no',
            'targetForeignKey'=>'emp_no'
        ]);

        
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
        ->scalar('dept_no')
        ->maxLength('dept_no', 4)
        ->allowEmptyString('dept_no', null, 'create');
        
        $validator
        ->scalar('dept_name')
        ->maxLength('dept_name', 40)
        ->requirePresence('dept_name', 'create')
        ->notEmptyString('dept_name')
        ->add('dept_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
        
        $validator
        ->scalar('description')
        ->maxLength('description', 255);
        
        $validator
        ->scalar('picture')
        ->maxLength('picture', 50);
        
        $validator
        ->scalar('address')
        ->maxLength('address', 255);
        
        $validator
        ->scalar('roi')
        ->maxLength('address', 100);
        
        
        return $validator;
    }
    
    public function findLastId(Query $query, $options){
        $query->select(['lastId'=>$query->func()->max('dept_no', ['latin1_swedish_ci'])]);
        return $query;
    }
    
    public function beforeSave(Event $event, EntityInterface $entity, $options) {
        if ($entity->isNew()){
            $lastId = $this->find('lastId')->first()->lastId;
            $number = substr($lastId, 1);
            $number++;
            $number = sprintf("d%'.03d", $number);
            $entity->dept_no = $number;
        }
        
    }
    

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['dept_name']), ['errorField' => 'dept_name']);

        return $rules;
    }
}
