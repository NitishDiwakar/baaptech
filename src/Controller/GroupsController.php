<?php
declare(strict_types=1);

namespace App\Controller;
ob_start();
use Cake\Datasource\ConnectionManager;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $groups = $this->paginate($this->Groups);

        // n
        $conn = ConnectionManager::get('default');


        /*$stmt = $conn->execute('SELECT * FROM states ');
        $states1 = $stmt ->fetchAll('assoc');
        $this->set(compact('states1'));*/


        // Whatsapp groups
        /*$stmt = $conn->execute('SELECT * FROM groups INNER JOIN states ON 
            groups.state_id = states.s_id
            WHERE groups.wa_link IS NOT NULL
            ORDER BY states.name
         ');
        $wa_groups = $stmt ->fetchAll('assoc');
        $this->set(compact('wa_groups'));*/

        $stmt = $conn->execute('SELECT * FROM states INNER JOIN groups ON 
            states.s_id = groups.state_id
            WHERE groups.wa_link IS NOT NULL AND groups.is_approved = 1
            ORDER BY states.name
         ');
        $wa_groups = $stmt ->fetchAll('assoc');
        $this->set(compact('wa_groups'));

        // Telegram groups
        $stmt = $conn->execute('SELECT * FROM groups INNER JOIN states ON 
            groups.state_id = states.s_id
            WHERE groups.tel_link IS NOT NULL AND groups.is_approved = 1
            ORDER BY states.name
         ');
        $tel_groups = $stmt ->fetchAll('assoc');
        $this->set(compact('tel_groups'));
        // en

        //$this->loadModel('States');
        $this->set(compact('groups'));

        $this->viewBuilder()->setLayout('custom');
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('group'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        // n
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT * FROM states ');
        $results = $stmt ->fetchAll('assoc');
            // print_r($results);
        // en

        $group = $this->Groups->newEmptyEntity();
        if ($this->request->is('post')) {
            //n
            $state_id = $this->request->getData('state_id');
            $state_id = $state_id + 1;
            $s_id = $state_id;
            // echo $state_id; exit;
            // en 
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            $group->state_id = $s_id;
            if ($this->Groups->save($group)) {
                $this->Flash->custom_success(__('Thank you for submitting your group. It will be published after our team review it.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->custom_error(__('The group could not be saved. Please, try again.'));
        }
        $this->set(compact('group'));
        // $this->set(compact('results'));

        $this->viewBuilder()->setLayout('custom');
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $this->set(compact('group'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
