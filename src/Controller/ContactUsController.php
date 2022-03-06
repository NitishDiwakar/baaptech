<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactUsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        if ($this->request->is('post')) 
        {
            $first_name = $this->request->getData('first_name'); 
            $last_name = $this->request->getData('last_name'); 
            $email = $this->request->getData('email'); 
            $mobile = $this->request->getData('mobile'); 
            $subject = $this->request->getData('subject'); 
            $message = $this->request->getData('message'); 

            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('
                INSERT INTO contact_us (`first_name`,`last_name`, `email`, `mobile`, `subject`, `message`, `created`)
                VALUES 
                ("'.$first_name.'", "'.$last_name.'", "'.$email.'", "'.$mobile.'", "'.$subject.'", "'.$message.'", NOW())
                ');
            $this->Flash->custom_success(__('Your message has submitted.'));

        }

        $this->viewBuilder()->setLayout('custom_home');
       
    }


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    

    // Login
    

}
