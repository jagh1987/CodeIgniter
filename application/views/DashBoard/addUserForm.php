<div id="body">
    <?= $MainMenu; ?>
    <?= form_open('DashBoard/questions')?>
    <?php
        $username= array('name'=> 'userName','placeholder'=> 'User Name','class'=> 'form-control','type'=> 'text');
        $name= array('name'=> 'Name','placeholder'=> 'Name','class'=> 'form-control','type'=> 'text');
        $userlastname= array('name'=> 'LastName','placeholder'=> 'Last Name','class'=> 'form-control','type'=> 'text');
    ?>
    <div class="card">
    <div class="card-body">
        <h2>Add New User</h2>
            <div class="form-group">
                <?= form_submit('','Save User...',"class='btn btn-primary float-right'") ?>
            </div>
            <div class="form-group">
                <?= form_label('User Name','userName') ?>
                <?= form_input($username) ?>
            </div>
            <div class="form-group">
                <?= form_label('Name','Name') ?>
                <?= form_input($name) ?>
            </div>
            <div class="form-group">
                <?= form_label('Last Name','LastName') ?>
                <?= form_input($userlastname) ?>
            </div>            
            <?= form_close() ?>
        </div>
    </div>
</div>
<br />