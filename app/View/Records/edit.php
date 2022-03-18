<div>
<?php echo $this->Flash->render('error'); ?>
    <?php echo $this->Form->create('Records',['class'=>'form-inline', 'url' => '/records/savechanges/'.$id]); ?>
        <?php echo $this->Form->input('first_name', array('type' => 'text', 'label' => 'First Name', 'value' => $records['Records']['first_name'])) ?>
        <?php echo $this->Form->input('last_name', array('type' => 'text', 'label' => 'Last Name', 'value' => $records['Records']['last_name'])) ?>
        <?php echo $this->Form->button('Save Record',['class'=>'btn btn-default']); ?>
    <?php echo $this->Form->end(); ?>
</div>