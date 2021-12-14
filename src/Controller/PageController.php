<?php


namespace App\Controller;
use  CodeItNow\BarcodeBundle\Utils\QrCode ;


/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PageController extends AppController
{


    public function home(){
        $qrCode = new QrCode();
        $qrCode 
            -> setText ( 'QR code par codeitnow.in' )
            -> setSize ( 100 )
            -> setPadding ( 10 )
            -> setErrorCorrection ( 'HIGH' )
            -> setForegroundColor ( array ( 'r' => 0 , 'g' => 0 , 'b' => 0 , 'a' => 0 ))
            -> setBackgroundColor ( array ( 'r' => 255 , 'g' => 255 , 'b' => 255 , 'a' => 0 ))
            -> setLabel ( 'Scan Qr Code' )
            -> setLabelFontSize ( 16 )
            -> setImageType (QrCode::IMAGE_TYPE_PNG )
        ;
        $imgQrCode =  '<img src="data:' . $qrCode -> getContentType (). ';base64,' . $qrCode -> generate (). '" />' ;
    $this->set(compact('imgQrCode'));
    }
    public function about(){

    }
    public function contact(){

    }
}