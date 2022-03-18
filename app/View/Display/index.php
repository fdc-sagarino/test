<div>
    <?php print_r($this->Flash->render('error')); ?>
    <?php echo $this->Form->create('Records',['class'=>'form-inline', 'url' => '/records/save']); ?>
    <div class="col-md-6">
        <div class="form-group row">
            <div class="col-md-4">
                <?php echo $this->Form->input('first_name', array('type' => 'text', 'label' => 'First Name', 'class' => 'form-control')) ?>
            </div>
            <div class="col-md-4">
                <?php echo $this->Form->input('last_name', array('type' => 'text', 'label' => 'Last Name', 'class' => 'form-control')) ?>
            </div>
            <div class="col-md-3">
                <?php echo $this->Form->button('Save Record', array('class'=>'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($records)):
            foreach ($records as $key => $record): ?>
            <tr>
                <td><?php echo $record['Records']['first_name']; ?></td>
                <td><?php echo $record['Records']['last_name']; ?></td>
                <td>
                    <?php
                        $status = $record['Records']['status'];
                        echo ($status == 'A') ? 'Active' : 'Removed';
                    ?>
                </td>
                <td>
                    <?php $actions = array(
                        array('name' => 'delete', 'label' => 'Permanently Delete |', 'confirmation' => array('confirm' => 'Are you sure?')),
                        ($record['Records']['status'] == 'A') ? array('name' => 'edit', 'label' => 'Edit Information |') : null,
                        ($record['Records']['status'] == 'A') ? array('name' => 'remove', 'label' => 'Remove ') : null,
                        ($record['Records']['status'] == 'X') ? array('name' => 'restore', 'label' => 'Restore') : null
                    ); 
                    foreach($actions as $action) {
                        echo $this->Html->link($action['label'], array(
                            "controller" => "records",
                            "action" => $action['name'],
                            "?" => array("record_id" => $record['Records']['id'])
                        ),
                        ($action['name'] == 'delete') ? $action['confirmation']: null);
                    }
                    ?>
                </td>
            </tr>
            <?php endforeach;
        endif; ?>
    </tbody>
</table>