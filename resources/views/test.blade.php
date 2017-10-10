<!DOCTYPE html>
<html lang="en">
<head>
<title>test project</title>
<link rel="stylesheet" href="{{ asset('/css/test.css') }}" rel="stylesheet" type="text/css"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

</head>
<body>

<? if(isset($test_edit))
   {  
      $edit_test_row = App\testmodel::find($test_edit->id);
       //echo json_encode($edit_test_row); 
      $name=$test_edit->name;
      $email=$test_edit->email;
      $phone=$test_edit->phone;
      $website=$test_edit->website;
      $subject=$test_edit->subject;
      $msg=$test_edit->msg;
      //echo json_encode($msg); 
    
?>    
{!! Form::open(array('method' => 'PUT', 'action' => 'test_controller@update', 'class' => 'form-style', 'enctype'=>"multipart/form-data"))  !!}
<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
<input type="hidden" value="{!! $test_edit->id !!}"  id="id" name="id">
<? }else
    {
    $name="";
    $email="";
    $phone="";
    $website="";
    $subject="";
    $msg="";
    $edit_test_row="";
?>

{!! Form::open(array('method' => 'post', 'class' => 'form-style', 'enctype'=>"multipart/form-data"))  !!}

<? } ?>


<ul>
<li>
    <input type="text" name="name" id="name" value="<? echo $name; ?>" class="field-style field-split align-left" placeholder="Name" />
    <input type="email" name="email" id="email" value="<? echo $email; ?>" class="field-style field-split align-right" placeholder="Email" />

</li>
<li>
    <input type="text" name="phone" id="phone" value="<? echo $phone; ?>" class="field-style field-split align-left" placeholder="Phone" />
    <input type="url" name="website" id="website" value="<? echo $website; ?>" class="field-style field-split align-right" placeholder="Website" />
</li>
<li>
<input type="text" name="subject" id="subject" value="<? echo $subject; ?>" class="field-style field-full align-none" placeholder="Subject" />
</li>
<li>
<textarea name="msg" id="msg" class="field-style" placeholder="Message"><? echo $msg; ?></textarea>
</li>
<li>

<? if(!isset($test_edit))
 {
?>
<input type="submit" id="submit" name="submit" value="Save" />
<? } else
{ ?>
<input type="submit" id="submit" name="submit" value="Update" />
<? } ?>
</li>
</ul>
{!! Form::close() !!}

<table width="100%" border="0" cellspacing="0" cellpadding="0" class=""  >
  <thead>
  <tr>
    <th width="27">#</th>
    <th width="40">Name</th>
    <th width="40">Email</th>
    <th width="40">Website</th>
    <th width="40">Subject</th>
    <th width="50">Phone</th>
    <th width="50">Message</th>
    <th width="55" class="action">Action</th>
    </tr>
  </thead>

   <tbody>
                    <?
                      $i=0;
                     // echo json_encode($tbl_awc);
                      foreach ($_test as $key => $row_) {
                      ?>
                    <tr>
                        <td style="font-size: 12px;"><? echo ++$i; ?></td>
                        <td style="font-size: 12px;"><? echo $row_->name; ?></td>
                        <td style="font-size: 12px;"><? echo $row_->email; ?></td>
                        <td style="font-size: 12px;"><? echo $row_->website; ?></td>
                        <td style="font-size: 12px;"><? echo $row_->subject; ?></td>
                        <td style="font-size: 12px;"><? echo $row_->phone; ?></td>
                        <td style="font-size: 12px;"><? echo $row_->msg; ?></td>
                        <td style="font-size: 14px;" class="center">
                          <a href="{{ URL::to('test/edit/' . $row_->id) }}" id="edit"><i class="fa fa-pencil "></i></a>
                          <a href="{{ URL::to('test/delete/' . $row_->id) }}" id="delete" class="confirm"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <? } ?>
                    </tbody>
  </table>
 
</body>
