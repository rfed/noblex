
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#fff">
  <tr>
    <td width="599" align="center" bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0">
    
    <table width="510" border="0" cellspacing="7">
  <tr bgcolor="#023b56">
    <td height="60" colspan="2" align="center" bgcolor="#2c2876" style="color:#ffffff; font-family:Arial, Helvetica, sans-serif; font-size:20px; font-weight:bold;">
    	<img src="{{ asset('plantilla_email/noblex.png') }}" width="150" height="28" alt="Noblex" longdesc="http://www.noblex.com.ar" /></td>
  </tr>
  <tr>
    <td height="40" colspan="2" valign="top"><img src="{{ asset('plantilla_email/shadow.png') }}" width="600" height="18" alt="Shadow" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="color:#2C2876; font-size:20px; font-weight:bold; font-family:Arial, Helvetica, sans-serif; border-bottom:1px #4c3c2c solid;">Nuevo contacto</td>
  </tr>
  <tr>
    <td height="5" colspan="2" align="left"></td>
  </tr>
  <tr>
    <td width="79" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#545555; font-weight:bold;">Nombre:</td>
    <td width="412" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#707070; ">{{ $contact->firstname.' '.$contact->lastname }}</td>
  </tr>
  <tr>
    <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#545555; font-weight:bold;">Email:</td>
    <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#707070; ">{{ $contact->email }}</td>
  </tr>
  <tr>
    <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#545555; font-weight:bold;">Asunto:</td>
    <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#707070; ">{{ $contact->subject->title }}</td>
  </tr>
  <tr>
    <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#545555; font-weight:bold;">Mensaje:</td>
    <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#707070; ">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#545555; "><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#707070;">{!! nl2br(e($contact->message)) !!}</span></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#545555; ">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#000000" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#545555; "><a href="http://www.noblex.com.ar" target="_blank" style="color:#ffffff; text-decoration:none;"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#ffffff;">www.noblex.com.ar</span></a></td>
  </tr>
    </table>

    </td>
  </tr>  
</table>

