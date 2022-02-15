<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
use Cake\Datasource\ConnectionManager;
$conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT * FROM states ');
        $results = $stmt ->fetchAll('assoc');
        // print_r($results);
        
        /*$myarray[] = '';
        foreach ($results as $result)
        {
            echo $result['name'] . "<br>";
            $myarray[] = $result['name'];

        }*/
        // print_r($myarray);
        // $states_without_quotes = (implode(" ",$myarray));
        // echo $states_without_quotes;
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Groups'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="groups form content">
            <?= $this->Form->create($group) ?>
            <fieldset>
                <legend><?= __('Add Group') ?></legend>
                <?php
                // n
                    /*echo $this->Form->select(
                        'field',
                        [1, 2, 3, 4, 5],
                        ['empty' => '(Select State)']
                    );*/
                // en
                    /*echo $this->Form->select(
                        'state_id',
                        ['adf', 'abc', 'ddd'],
                        ['empty' => '(choose one)']
                    );*/
                     echo $this->Form->select(
                        'state_id',
                        ['ANDHRA PRADESH', 'ASSAM', 'ARUNACHAL PRADESH', 'BIHAR', 'GUJRAT', 'HARYANA', 'HIMACHAL PRADESH', 'JAMMU & KASHMIR', 'KARNATAKA', 'KERALA', 'MADHYA PRADESH', 'MAHARASHTRA', 'MANIPUR', 'MEGHALAYA', 'MIZORAM', 'NAGALAND', 'ORISSA', 'PUNJAB', 'RAJASTHAN', 'SIKKIM', 'TAMIL NADU', 'TRIPURA', 'UTTAR PRADESH', 'WEST BENGAL', 'DELHI', 'GOA', 'PONDICHERY', 'LAKSHDWEEP', 'DAMAN & DIU', 'DADRA & NAGAR', 'CHANDIGARH', 'ANDAMAN & NICOBAR', 'UTTARANCHAL', 'JHARKHAND', 'CHATTISGARH'],
                        ['empty' => '(Select State)']
                    );
                    echo $this->Form->control('city');
                    echo $this->Form->control('wa_name', ['label' => 'Whatsapp Group name']);
                    echo $this->Form->control('wa_link', ['label' => 'Whatsapp Group link']);
                    echo $this->Form->control('tel_name');
                    echo $this->Form->control('tel_link');
                    // echo $this->Form->control('is_approved');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
