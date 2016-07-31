//@Author: Mark Genesis T. Romantigue
//email:markg.romantigue@gmail.com
//version 1.0

var i=3;
function addRow(){
    $('#myTable tr.addMore').before("<tr>                         <td width='87'>                             <p style='text-align: center;'>" + i + "</p>                         </td>                         <td width='87'>                             <select name='phase[]' id='phase" + i + "' data-validation='required' data-validation-depends-on='caev" + i + "'>                                 <option value='' disabled selected>Select</option>                                 <option value='Planning'>Planning</option>                                 <option value='Design'>Design</option>                                 <option value='Code'>Code</option>                                 <option value='Compile'>Compile</option>                                 <option value='Test'>Test</option>                                 <option value='Postmortem'>Postmortem</option>                             </select>                         </td>                         <td width='87'>                             <input type='text' size='8' name='hours[]' id='hours" + i + "' class='toAdd' data-validation='number' data-validation-allowing='float' data-validation-depends-on='phase" + i + "'>                         </td>                         <td width='87'>                             <input type='text' size='8' name='pv[]' id='pv" + i + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='hours" + i + "'>                         </td>                         <td width='87'>                             <input type='text' size='8' name='taskch[]' id='taskch" + i + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='pv" + i + "'>                         </td>                         <td width='87'>                             <input type='text' size='9' name='taskcpv[]' id='taskcpv" + i + "' data-validation='number' data-validation-allowing='float' data-validation-depends-on='taskch" + i + "'>                         </td>                         <td width='87'>                             <input type='date' step=7 min=" + i + "014-09-08 name='taskDateMonday[]' name='taskDateMonday[]' id='taskDateMonday" + i + "' data-validation='required' data-validation-depends-on='taskcpv" + i + "'>                         </td>                         <td width='87'>                             <input type='date' name='taskDate[]' id='taskDate" + i + "' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='ev[]' id='ev" + i + "' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='taskcev[]' id='taskcev" + i + "' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='actualev[]' id='actualev" + i + "' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='caev[]' id='caev" + i + "' disabled>                         </td>                     </tr>");
    i++;
}
function addObjectRow(){
    $('#myTable tr.addMoreObjectRow').before("<tr style='height: 35px;'><td style='width: 284px; height: 35px;'><input type='text' name='NO[]' id='base" + i + "' style='width: 280px;' data-validation='required' data-validation-depends-on='total" + i + "'></td><td style='width: 31px; height: 35px;'><p>&nbsp;</p></td><td style='width: 139px; height: 35px;'><center><select name='type2[]' id='x" + i + "' data-validation='required' data-validation-depends-on='base" + i + "'><option value='' disabled selected>Select type</option><option value='logic'>Logic</option><option value='io'>Input/Output</option><option value='calculation'>Calculation</option><option value='text'>Text</option><option value='data'>Data</option><option value='setup'>Set-Up</option></select></center></td><td style='width: 31px; height: 35px;'><p><strong>&nbsp;</strong></p></td><td style='width: 139px; height: 35px;'><input type='text' name='methods2[]' id='item" + i + "'></td><td style='width: 31px; height: 35px;'><p><strong>&nbsp;</strong></p></td><td style='width: 171px; height: 35px;'><center><select name='size2[]' id='y" + i + "' data-validation='required' data-validation-depends-on='x" + i + "'><option value='' disabled selected>Select Size</option><option value='verysmall'>Very Small</option><option value='small'>Small</option><option value='medium'>Medium</option><option value='large'>Large</option><option value='verylarge'>Very Large</option></select></center></td><td style='width: 10px; height: 35px;'><p><strong>&nbsp;</strong></p></td><td style='idth: 156px; height: 35px;'><input type='text' name='loc2[]' class='toAdd2' id='total" + i + "' data-validation='required' data-validation-depends-on='y" + i + "'></td></tr>");
    i++;
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
    $(document).on('change', '[id^="pv"]', function(){
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