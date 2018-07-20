<div id="body"> 
    <?= $MainMenu; ?>
    <?= form_open("DashBoard/updateUser/". $User["id"]) ?>
    <?php
        $userid= array('name'=> 'userid','placeholder'=> 'User Id','class'=> 'form-control','type'=> 'text','disabled'=>'disabled','value'=> $User["id"]);
        $username= array('name'=> 'userName','placeholder'=> 'User Name','class'=> 'form-control','type'=> 'text','value'=> $User["userName"]);
        $name= array('name'=> 'Name','placeholder'=> 'Name','class'=> 'form-control','type'=> 'text','value'=> $User["Name"]);
        $userlastname= array('name'=> 'LastName','placeholder'=> 'Last Name','class'=> 'form-control','type'=> 'text','value'=> $User["LastName"]);
        
    ?>
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <?= form_submit('','UpdateUser...',"class='btn btn-primary float-right'") ?>
            </div>
            <div class="form-group">
                <?= form_label('id','userid') ?>
                <?= form_input($userid) ?>
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
    <br />
    <?= form_open('DashBoard/Savequestions/'. $User["id"])?>
    <div class="card">
        <div class="card-body">
        <?= form_submit('','Save',"class='btn btn-primary float-right'") ?>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <h3 class="text-center">Seleccione la respuesta correcta</h3>
                    
                    <?= form_hidden('userid', $User["id"]) ?>
                    <br />
                    <div class="row">
                        <div class="col-lg-6 col-lg-6 col-md-12 col-xs-12">
                            <div class="row">
                                <div class="col">
                                    <p class="lead text-right"><strong>You</strong></p>
                                </div>
                                <div class="col">
                                    <select class="form-control" name="sel1" id="sel1" onchange="validateForm()">
                                        <option>seleccione</option>
                                        <option>are</option>
                                        <option>am</option>
                                        <option>is</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <p class="lead text-left"><strong>a man</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6 col-md-12 col-xs-12">
                            <div class="row">
                                    <div class="col">
                                        <p class="lead text-right"><strong>He</strong></p>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="sel2" id="sel2" onchange="validateForm()">
                                            <option>seleccione</option>
                                            <option>am</option>
                                            <option>is</option>
                                            <option>are</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <p class="lead text-left"><strong>a boy</strong></p>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6 col-lg-6 col-md-12 col-xs-12">
                            <div class="row">
                                <div class="col">
                                    <p class="lead text-right"><strong>They</strong></p>
                                </div>
                                <div class="col">
                                    <select class="form-control" name="sel3" id="sel3" onchange="validateForm()">
                                        <option>seleccione</option>
                                        <option>am</option>
                                        <option>is</option>
                                        <option>are</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <p class="lead text-left"><strong>girls</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-6 col-md-12 col-xs-12">
                            <div class="row">
                                    <div class="col">
                                        <p class="lead text-right"><strong>She</strong></p>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="sel4" id="sel4" onchange="validateForm()">
                                            <option>seleccione</option>
                                            <option>is</option>
                                            <option>am</option>
                                            <option>are</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <p class="lead text-left"><strong>a girl</strong></p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <h3 class="text-center">Seleccione la respuesta correcta</h3>
                    <br />
                    <p class="lead text-center"><strong>I am a man</strong></p>
                    <div class="row">
                        <div class="col text-center">
                            <label class="check-container">
                                <img src="<?= base_url()?>/assets/img/woman.png" title="woman" id="img-woman" class="img-thumbnail mx-auto d-block"/>
                                <?= form_radio('q2', 'woman', set_checkbox('q2', 'woman'), "id='woman' onchange='validateForm();'"); ?>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col text-center">
                            <label class="check-container">
                                <img src="<?= base_url()?>/assets/img/man.png" title="man" id="img-man" class="img-thumbnail mx-auto d-block"/>
                                <?= form_radio('q2', 'man', set_checkbox('q2', 'man'), "id='man' onchange='validateForm();'"); ?>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col text-center">
                            <label class="check-container">
                                <img src="<?= base_url()?>/assets/img/boy.png" title="boy" id="img-boy"  class="img-thumbnail mx-auto d-block"/>
                                <?= form_radio('q2', 'boy', set_checkbox('q2', 'boy'), "id='boy' onchange='validateForm();'"); ?>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <h3 class="text-center">Escriba la respuesta correcta</h3>
                    <br />
                    <?php $patter="[a-zA-Z]+" ?>
                    <div class="">
                        <div class="row">
                            <div class="form-inline mx-auto">
                                <div class="form-group mb-2">
                                    <label for="staticYou" class="sr-only">You</label>
                                    <input type="text" readonly="" class="form-control-plaintext text-right" id="staticYou" value="You">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    
                                    <?php $txt1= array('id'=> 'txt1','name'=> 'txt1','placeholder'=> 'please complete','class'=> 'form-control','type'=> 'text', 'onkeyup'=>'return $(this).val($(this).val().toLowerCase())', 'pattern'=> $patter, 'value'=>'');?>
                                    <?= form_input($txt1) ?>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="staticA" class="sr-only">a</label>
                                    <input type="text" readonly="" class="form-control-plaintext text-right" id="staticA" value="a">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <?php $patter="[a-zA-Z]+" ?>
                                    <?php $txt2= array('id'=> 'txt2','name'=> 'txt2','placeholder'=> 'please complete','class'=> 'form-control','type'=> 'text', 'onkeyup'=>'return $(this).val($(this).val().toLowerCase())', 'pattern'=> $patter, 'value'=>'');?>
                                    <?= form_input($txt2) ?>
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="form-inline mx-auto">
                                <div class="form-group mb-2">
                                    <label for="staticHe" class="sr-only">He</label>
                                    <input type="text" readonly="" class="form-control-plaintext text-right" id="staticHe" value="He">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <?php  $txt3= array('id'=> 'txt3','name'=> 'txt3','placeholder'=> 'please complete','class'=> 'form-control','type'=> 'text', 'onkeyup'=>'return $(this).val($(this).val().toLowerCase())', 'pattern'=> $patter, 'value'=>'');?>
                                    <?= form_input($txt3) ?>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="staticA2" class="sr-only">a</label>
                                    <input type="text" readonly="" class="form-control-plaintext text-right" id="staticA2" value="a">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <?php $txt4= array('id'=> 'txt4','name'=> 'txt4','placeholder'=> 'please complete','class'=> 'form-control','type'=> 'text', 'onkeyup'=>'return $(this).val($(this).val().toLowerCase())', 'pattern'=> $patter, 'value'=>'');?>
                                    <?= form_input($txt4) ?>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="form-inline mx-auto">
                                <div class="form-group mb-2">
                                    <label for="staticThey" class="sr-only">They</label>
                                    <input type="text" readonly="" class="form-control-plaintext text-right" id="staticThey" value="They">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <?php $txt5= array('id'=> 'txt5','name'=> 'txt5','placeholder'=> 'please complete','class'=> 'form-control','type'=> 'text', 'onkeyup'=>'return $(this).val($(this).val().toLowerCase())', 'pattern'=> $patter, 'value'=>'');?>
                                    <?= form_input($txt5) ?>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="staticgirls" class="sr-only">girls</label>
                                    <input type="text" readonly="" class="form-control-plaintext text-left" id="staticgirls" value="girls">
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="form-inline mx-auto">
                                <div class="form-group mb-2">
                                    <label for="staticShe" class="sr-only">She</label>
                                    <input type="text" readonly="" class="form-control-plaintext text-right" id="staticShe" value="She">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                <?php $txt6= array('id'=> 'txt6','name'=> 'txt6','placeholder'=> 'please complete','class'=> 'form-control','type'=> 'text', 'onkeyup'=>'return $(this).val($(this).val().toLowerCase())', 'pattern'=> $patter, 'value'=>'');?>
                                <?= form_input($txt6) ?>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="staticagirl" class="sr-only">a girl</label>
                                    <input type="text" readonly="" class="form-control-plaintext text-left" id="staticagirl" value="a girl">
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">3</a>
                </li>
            </ul>
        </div>
    </div>
    <?= form_close() ?>
</div>
<script>
    $(function() {
        $("#sel1").val("<?= $q1->sel1 ?>");
        $("#sel2").val("<?= $q1->sel2 ?>");
        $("#sel3").val("<?= $q1->sel3 ?>");
        $("#sel4").val("<?= $q1->sel4 ?>");

        $("input[name='q2'][value='<?= $q2 ?>']").attr('checked', 'checked');

        $("#txt1").val("<?= $q3->txt1 ?>");
        $("#txt2").val("<?= $q3->txt2 ?>");
        $("#txt3").val("<?= $q3->txt3 ?>");
        $("#txt4").val("<?= $q3->txt4 ?>");
        $("#txt5").val("<?= $q3->txt5 ?>");
        $("#txt6").val("<?= $q3->txt6 ?>");

       

        validateForm();
    });  
    function validateForm()
    {
        validateSelect("sel1","are");
        validateSelect("sel2","is");
        validateSelect("sel3","are");
        validateSelect("sel4","is");
        
        $("img").removeClass("is-valid");
        $("img").removeClass("is-invalid");
        $("#img-"+$("input[name='q2']:checked").val()).addClass( ($("input[name='q2']:checked").val()=="man")? "is-valid":"is-invalid" );

        validateTextbox("txt1","are");
        validateTextbox("txt2","man");
        validateTextbox("txt3","is");
        validateTextbox("txt4","boy");
        validateTextbox("txt5","are");
        validateTextbox("txt6","is");
    }
    function validateSelect(sel,correctAnswer)
    {
        removeValidationClass(sel);
        $("#"+sel+"").addClass( ($("#"+sel+" option:selected").text()==correctAnswer)? "is-valid":"is-invalid" );
    }
    function validateTextbox(textbox,correctAnswer){
        removeValidationClass(textbox);
        $("#"+textbox+"").addClass( ($("#"+textbox+"").val()==correctAnswer)? "is-valid":"is-invalid" );
    }
    function removeValidationClass(elem)
    {
        $("#"+elem+"").removeClass("is-valid");
        $("#"+elem+"").removeClass("is-invalid");
    }
</script>