//@Author: Mark Genesis T. Romantigue
//email:markg.romantigue@gmail.com
//version 1.0

var i=3;
var j=3;

function addRow(){
    $('#myTable tr.addMore').before("<tr>                         <td width='87'>                             <p style='text-align: center;'>" + i + "</p>                         </td>                         <td width='87'>                             <select name='phase[]' id='phase" + i + "' data-validation='required' data-validation-depends-on='caev" + i + "'>                                 <option value='' disabled selected>Select</option>                                 <option value='Planning'>Planning</option>                                 <option value='Design'>Design</option>                                 <option value='Code'>Code</option>                                 <option value='Compile'>Compile</option>                                 <option value='Test'>Test</option>                                 <option value='Postmortem'>Postmortem</option>                             </select>                         </td>                         <td width='87'>                             <input type='text' size='8' name='hours[]' id='hours" + i + "' class='toAdd' data-validation='number' data-validation-allowing='float' data-validation-depends-on='phase" + i + "'>                         </td>                         <td width='87'>                             <input type='text' size='8' name='pv[]' id='pv" + i + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='plandh" + i + "'>                         </td>                         <td width='87'>                             <input type='text' size='8' name='taskch[]' id='taskch" + i + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='pv" + i + "'>                         </td>                         <td width='87'>                             <input type='text' size='9' name='taskcpv[]' id='taskcpv" + i + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='taskch" + i + "'>                         </td>                         <td width='87'>                             <input type='date' step=7 min=2014-09-08 name='taskDateMonday[]' name='taskDateMonday[]' id='taskDateMonday" + i + "' data-validation='required' data-validation-depends-on='taskcpv" + i + "'>                         </td>                         <td width='87'>                             <input type='date' name='taskDate[]' id='taskDate" + i + "' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='ev[]' id='ev" + i + "' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='taskcev[]' id='taskcev" + i + "' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='actualev[]' id='actualev" + i + "' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='caev[]' id='caev" + i + "' disabled>                         </td>                     </tr>");
    i++;
}
function addRow2(){
    $('#myTable tr.addMore').before("<tr>                         <td width='87'>                             <p style='text-align: center;'>" + x + "</p>                         </td>                         <td width='87'>                             <select name='phase[]' id='phase" + x + "' data-validation='required' data-validation-depends-on='caev" + x + "'>                                 <option value='' disabled selected>Select</option>                                 <option value='Planning'>Planning</option>                                 <option value='Design'>Design</option>                                 <option value='Code'>Code</option>                                 <option value='Compile'>Compile</option>                                 <option value='Test'>Test</option>                                 <option value='Postmortem'>Postmortem</option>                             </select>                         </td>                         <td width='87'>                             <input type='text' size='8' name='hours[]' id='hours" + x + "' class='toAdd' data-validation='number' data-validation-allowing='float' data-validation-depends-on='phase" + x + "'>                         </td>                         <td width='87'>                             <input type='text' size='8' name='pv[]' id='pv" + x + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='plandh" + x + "'>                         </td>                         <td width='87'>                             <input type='text' size='8' name='taskch[]' id='taskch" + x + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='pv" + x + "'>                         </td>                         <td width='87'>                             <input type='text' size='9' name='taskcpv[]' id='taskcpv" + x + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='taskch" + x + "'>                         </td>                         <td width='87'>                             <input type='date' step=7 min=2014-09-08 name='taskDateMonday[]' name='taskDateMonday[]' id='taskDateMonday" + x + "' data-validation='required' data-validation-depends-on='taskcpv" + x + "'>                         </td>                         <td width='87'>                             <input type='date' name='taskDate[]' id='taskDate" + x + "' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='ev[]' id='ev" + x + "' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='taskcev[]' id='taskcev" + x + "' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='actualev[]' id='actualev" + x + "' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='caev[]' id='caev" + x + "' disabled>                         </td>                     </tr>");
    x++;
}
function addObjectRow(){
    $('#myTable2 tr.addMoreObjectRow').before("<tr>                         <td style='width: 109px;'>                             <p style='text-align: center;'>" + j + "</p>                         </td>                         <td style='width: 109px;'>                             <input type='date' step=7 min=2014-09-08 name='schedDateMonday[]' id='schedDateMonday" + j + "' data-validation='required' data-validation-depends-on='schedcpv" + j + "'>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='plandh[]' id='plandh" + j + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='schedDateMonday" + j + "'>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='schedch[]' id='schedch" + j + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='plandh" + j + "'>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='schedcpv[]' id='schedcpv" + j + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='schedch" + j + "'>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='actualdh[]' id='actualdh" + j + "' disabled>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='actualschedch[]' id='actualschedch" + j + "' disabled>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='schedcev[]' id='schedcev" + j + "' disabled>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='adjustedev[]' id='adjustedev" + j + "' disabled>                         </td>                     </tr>");
    j++;
}
function addObjectRow2(){
    $('#myTable2 tr.addMoreObjectRow').before("<tr>                         <td style='width: 109px;'>                             <p style='text-align: center;'>" + y + "</p>                         </td>                         <td style='width: 109px;'>                             <input type='date' step=7 min=2014-09-08 name='schedDateMonday[]' id='schedDateMonday" + y + "' data-validation='required' data-validation-depends-on='schedcpv" + y + "'>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='plandh[]' id='plandh" + y + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='schedDateMonday" + y + "'>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='schedch[]' id='schedch" + y + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='plandh" + y + "'>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='schedcpv[]' id='schedcpv" + y + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='schedch" + y + "'>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='actualdh[]' id='actualdh" + y + "' disabled>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='actualschedch[]' id='actualschedch" + y + "' disabled>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='schedcev[]' id='schedcev" + y + "' disabled>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='adjustedev[]' id='adjustedev" + y + "' disabled>                         </td>                     </tr>");
    y++;
}
$(document).on('click','.toAdd',function() {
    $('.toAdd').keyup(function() {
        var result = 0;
        var P = 0;
        $('#totalBA').attr('value', function() {
            $('.toAdd').each(function() {
                if ($(this).val() !== '') {
                    result += parseFloat($(this).val());
                }
            });
            return result.toFixed(2);
        });
        $('#P').attr('value', function() {
            $('#totalBA, #totalNO').each(function() {
                if ($(this).val() !== '') {
                    P += parseFloat($(this).val());
                }
            });
            return P;
        });
        $('#totalR').attr('value', 0);
        $('#P').trigger('keyup');
    });
});
$(document).on('click','.toAdd2',function() {
    $('.toAdd2').keyup(function() {
        var result = 0;
        var P = 0;
        $('#totalBA2').attr('value', function() {
            $('.toAdd2').each(function() {
                if ($(this).val() !== '') {
                    result += parseFloat($(this).val());
                }
            });
            return result.toFixed(2);
        });
        $('#P').attr('value', function() {
            $('#totalBA2, #totalNO').each(function() {
                if ($(this).val() !== '') {
                    P += parseFloat($(this).val());
                }
            });
            return P;
        });
        $('#totalR').attr('value', 0);
        $('#P').trigger('keyup');
    });
});
$(document).on('click','.toAdd3',function() {
    $('.toAdd3').keyup(function() {
        var result = 0;
        $('#totalR').attr('value', function() {
            $('.toAdd3').each(function() {
                if ($(this).val() !== '') {
                    result += parseFloat($(this).val());
                }
            });
            return result;
        });
        $('#totalR').trigger('keyup');
    });
});
$( document ).ready(function() {
    $('#M,#P,#b0,#b1').keyup(function() {
        var result = 0;
        $('#N').attr('value', function() {
            if ($('#M').val() !== '' && $('#P').val() !== '' && $('#b0').val() !== '' && $('#M').val() !== '') {
                result = parseFloat($('#b0').val()) + parseFloat($('#b1').val()) * (parseFloat($('#P').val()) + parseFloat($('#M').val()));
            }else{
                result=0;
            }
            return result;
        });
        $('#N').trigger('keyup');
    });
});
$( document ).ready(function() {
    $('#N,#B,#D,#M,#totalR').keyup(function() {
        var result = 0;
        $('#T').attr('value', function() {
            result = parseFloat($('#N').val()) + parseFloat($('#B').val()) - parseFloat($('#D').val()) - parseFloat($('#M').val()) + parseFloat($('#totalR').val());
            return result;
        });
    });
});
$( document ).ready(function() {
    $(document).on('change', '[id^=pv]', function(){
        var result = 0;
        var result2 = 0;
        var num = this.id.split('pv')[1];

        $('#pv' + num).val(function() {
            var items = $('#hours'  + num).val();
            //if(items == 0){
            //    items=1;
            //}
            result = items / $('#totalBA').val();
        return result.toFixed(2);
        });
        if(num == 1){
            $('#taskch' + num).val(function() {
                var items2 = $('#hours'  + num).val();
                //if(items == 0){
                //    items=1;
                //}
                result2 = (items2 / 1);
            return result2.toFixed(2);
            });
            $('#taskcpv' + num).val(function() {
                var items2 = $('#pv'  + num).val();
                //if(items == 0){
                //    items=1;
                //}
                result2 = (items2 / 1);
            return result2.toFixed(2);
            });
        }else{
            $('#taskch' + num).val(function() {
                var items2 = $('#hours'  + num).val();
                //if(items == 0){
                //    items=1;
                //}
                result2 = (items2 / 1) + ($('#taskch'  + (num-1)).val()/1);
            return result2.toFixed(2);
            });
            $('#taskcpv' + num).val(function() {
                var items2 = $('#pv'  + num).val();
                //if(items == 0){
                //    items=1;
                //}
                result2 = (items2 / 1) + ($('#taskcpv'  + (num-1)).val()/1);
            return result2.toFixed(2);
            });
        }
        //$('.toAdd').trigger('click');
        //$('.toAdd').trigger('keyup');
    });
});
$( document ).ready(function() {
    $(document).on('change', '[id^="schedch"]', function(){
        var result2 = 0;
        var num = this.id.split('schedch')[1];
        if(num == 1){
            $('#schedch' + num).val(function() {
                var items2 = $('#plandh'  + num).val();
                //if(items == 0){
                //    items=1;
                //}
                result2 = (items2 / 1);
            return result2.toFixed(2);
            });
        }else{
            $('#schedch' + num).val(function() {
                var items2 = $('#plandh'  + num).val();
                //if(items == 0){
                //    items=1;
                //}
                result2 = (items2 / 1) + ($('#schedch'  + (num-1)).val()/1);
            return result2.toFixed(2);
            });
        }
        //$('.toAdd').trigger('click');
        //$('.toAdd').trigger('keyup');
    });
});
$( document ).ready(function() {
    $(document).on('change', '[id^="taskcev"]', function(){
        var result2 = 0;
        var num = this.id.split('taskcev')[1];
        if(num == 1){
            $('#taskcev' + num).val(function() {
                var items2 = $('#ev'  + num).val();
                //if(items == 0){
                //    items=1;
                //}
                result2 = (items2 / 1);
            return result2.toFixed(2);
            });
        }else{
            $('#taskcev' + num).val(function() {
                var items2 = $('#ev'  + num).val();
                //if(items == 0){
                //    items=1;
                //}
                result2 = (items2 / 1) + ($('#taskcev'  + (num-1)).val()/1);
            return result2.toFixed(2);
            });
        }
        //$('.toAdd').trigger('click');
        //$('.toAdd').trigger('keyup');
    });
});
$( document ).ready(function() {
    $(document).on('change', '[id^="actualschedch"]', function(){
        var result2 = 0;
        var num = this.id.split('actualschedch')[1];
        if(num == 1){
            $('#actualschedch' + num).val(function() {
                var items2 = $('#actualdh'  + num).val();
                //if(items == 0){
                //    items=1;
                //}
                result2 = (items2 / 1);
            return result2.toFixed(2);
            });
        }else{
            $('#actualschedch' + num).val(function() {
                var items2 = $('#actualdh'  + num).val();
                //if(items == 0){
                //    items=1;
                //}
                result2 = (items2 / 1) + ($('#actualschedch'  + (num-1)).val()/1);
            return result2.toFixed(2);
            });
        }
        //$('.toAdd').trigger('click');
        //$('.toAdd').trigger('keyup');
    });
});
$( document ).ready(function() {
    $(document).on('change', '[id^="caev"]', function(){
        var result2 = 0;
        var num = this.id.split('caev')[1];
            $('#caev' + num).val(function() {
                var items2 = $('#actualev'  + num).val();
                //if(items == 0){
                //    items=1;
                //}
                result2 = (items2 / $('#totalBA2').val());
            return result2.toFixed(2);
            });
        //$('.toAdd').trigger('click');
        //$('.toAdd').trigger('keyup');
    });
});
$(document).on('click', '[id^=hours]', function(){
    var num = this.id.split('hours')[1];
    $('#hours' + num).keyup(function() {
        //$('#pv' + num).trigger('change');
        //$('#taskch' + num).trigger('change');
        if(num > 1){
            $('[id^="pv"]').trigger('change');
        }else{
            $('#pv' + num).trigger('change');
        }
    });
});
$(document).on('click', '[id^=plandh]', function(){
    var num = this.id.split('plandh')[1];
    $('#plandh' + num).keyup(function() {
        //$('#pv' + num).trigger('change');
        //$('#taskch' + num).trigger('change');
        if(num > 1){
            $('[id^="schedch"]').trigger('change');
        }else{
            $('#schedch' + num).trigger('change');
        }
    });
});
$(document).on('click', '[id^=actualev]', function(){
    var num = this.id.split('actualev')[1];
    $('#actualev' + num).keyup(function() {
        //$('#pv' + num).trigger('change');
        //$('#taskch' + num).trigger('change');
        if(num > 1){
            $('[id^="caev"]').trigger('change');
        }else{
            $('#caev' + num).trigger('change');
        }
    });
});
$(document).on('click', '[id^=ev]', function(){
    var num = this.id.split('ev')[1];
    $('#ev' + num).keyup(function() {
        //$('#pv' + num).trigger('change');
        //$('#taskch' + num).trigger('change');
        $('#taskcev' + num).trigger('change');
    });
});
$(document).on('click', '[id^=actualdh]', function(){
    var num = this.id.split('actualdh')[1];
    $('#actualdh' + num).keyup(function() {
        //$('#pv' + num).trigger('change');
        //$('#taskch' + num).trigger('change');
        $('#actualschedch' + num).trigger('change');
    });
});