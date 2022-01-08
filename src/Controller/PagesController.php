<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use  CodeItNow\BarcodeBundle\Utils\QrCode ;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
<<<<<<< HEAD
=======
    public function display(string ...$path): ?Response
    {
        $this->Authorization->skipAuthorization();
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;
>>>>>>> master

    public function home(){
     
        
    }
    // public function display(string ...$path): ?Response
    // {
    //     if (!$path) {
    //         return $this->redirect('/');
    //     }
    //     if (in_array('..', $path, true) || in_array('.', $path, true)) {
    //         throw new ForbiddenException();
    //     }
    //     $page = $subpage = null;

    //     if (!empty($path[0])) {
    //         $page = $path[0];
    //     }
    //     if (!empty($path[1])) {
    //         $subpage = $path[1];
    //     }
    //     $this->set(compact('page', 'subpage'));

    //     try {
    //         return $this->render(implode('/', $path));
    //     } catch (MissingTemplateException $exception) {
    //         if (Configure::read('debug')) {
    //             throw $exception;
    //         }
    //         throw new NotFoundException();
    //     }
    // }
    

  
    public function about(){

    }
    public function contact(){

<<<<<<< HEAD
=======
        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    } public function home(){
        $this->Authorization->skipAuthorization();
        $qrCode = new QrCode();
        $qrCode
        -> setText ( 'https://www.lesoir.be/' )
        -> setSize ( 100 )
        -> setPadding ( 40 )
        -> setErrorCorrection ( 'HIGH' )
        -> setForegroundColor ( array ( 'r' => 0 , 'g' => 0 , 'b' => 0 , 'a' => 0 ))
        -> setBackgroundColor ( array ( 'r' => 255 , 'g' => 255 , 'b' => 255 , 'a' => 0 ))
        -> setLabel ( 'Visit this website' )
        -> setLabelFontSize ( 16 )
        -> setImageType (QrCode::IMAGE_TYPE_PNG )
        ;
        $imgQrCode =  '<img src="data:' . $qrCode -> getContentType (). ';base64,' . $qrCode -> generate (). '" />' ;
        $this->set(compact('imgQrCode'));
>>>>>>> master
    }
}
