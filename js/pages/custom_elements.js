$("#multiselect1").multiselect();
$("#multiselect2").multiselect({
    enableFiltering: true,
    includeSelectAllOption: true,
    maxHeight: 300,
    dropUp: true
});
$("#select21").select2({
    theme:"bootstrap",
    placeholder:"select a value"
});
$("#select22").select2({
    theme:"bootstrap",
    placeholder:"select a value"
});
function formatState (state) {
    if (!state.id) { return state.text; }
    var $state = $(
        '<span><img src="img/us_states_flags/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
    );
    return $state;


}
$("#select23").select2({
    templateResult: formatState,
    templateSelection: formatState,
    placeholder: "select",
    theme:"bootstrap"
});
$('#select24').select2({
    allowClear: true,
    theme:"bootstrap",
    placeholder: "select"
});
$('#select25').select2({
    allowClear: true,
    theme:"bootstrap",
    placeholder: "select"
});

$('#select26').select2({
    placeholder: "select",
    theme:"bootstrap"
});


$('#select-gear').selectize({
    sortField: 'text'
});
$("#selectize3").selectize({
    maxItems: 3
});
$('#selectize-tags1').selectize({
    plugins: ['restore_on_backspace'],
    delimiter: ',',
    persist: false,
    create: function(input) {
        return {
            value: input,
            text: input
        }
    }
});
$('#selectize-tags2').selectize({
    plugins: ['remove_button'],
    delimiter: ',',
    persist: false,
    create: function (input) {
        return {
            value: input,
            text: input
        }
    }
});
$('#selectize-tags3').selectize({
    plugins: ['drag_drop'],
    delimiter: ',',
    persist: false,
    create: function(input) {
        return {
            value: input,
            text: input
        }
    }
});


//iCheck for checkbox and radio inputs
$('input[type="checkbox"].square, input[type="radio"].square').iCheck({
    checkboxClass: 'icheckbox_square-green',
    radioClass: 'iradio_square-green',
    increaseArea: '20%'
});
//Red color scheme for iCheck
$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass: 'iradio_minimal-red',
    increaseArea: '20%'
});
//Flat red color scheme for iCheck
$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-red',
    radioClass: 'iradio_flat-red',
    increaseArea: '20%'
});
//Flat green color scheme
$('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green',
    increaseArea: '20%'
});
$('input.line').each(function(){
    var self = $(this),
        label = self.next(),
        label_text = label.text();

    label.remove();
    self.iCheck({
        checkboxClass: 'icheckbox_line-red',
        radioClass: 'iradio_line-red',
        increaseArea: '20%',
        insert: '<div class="icheck_line-icon"></div>' + label_text
    });
});

$("[name='my-checkbox']").bootstrapSwitch();


var elem = document.querySelector('.js-switch');
var init = new Switchery(elem, {
    size: 'small',
    color: '#418bca'
});
var elem = document.querySelector('.js-switch2');
var init = new Switchery(elem, {
    size: 'big',
    color: '#418bca'
});
var elem = document.querySelector('.js-switch3');
var init = new Switchery(elem, {
    size: 'large',
    color: '#418bca'
});

var elem = document.querySelector('.js-switch4');
var init = new Switchery(elem, {
    size: 'big',
    color: '#01BC8C'
});
var elem = document.querySelector('.js-switch5');
var init = new Switchery(elem, {
    size: 'big',
    color: '#F89A14'
});
var elem = document.querySelector('.js-switch6');
var init = new Switchery(elem, {
    size: 'big',
    color: '#EF6F6C'
});

var elem = document.querySelector('.js-switch7');
var init = new Switchery(elem, {
    size: 'big',
    color: '#01BC8C'
});
var elem = document.querySelector('.js-switch8');
var init = new Switchery(elem, {
    size: 'big',
    color: '#01BC84'
});
var elem = document.querySelector('.js-switch9');
var init = new Switchery(elem, {
    size: 'big',
    color: '#01BC8C'
});
// end of switchery's.
