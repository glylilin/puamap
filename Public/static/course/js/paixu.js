function paixu(){
    var vcourse = new Array();
    var vcourse_jiage = new Array();
    var vcourse_hot = new Array();
    var vcourse_ul = $('.vcourse_list1');
    var vcourse_li = vcourse_ul.find('li');
    var li_length = vcourse_li.length;
    var array = [];
    for(var j=0;j<li_length;j++){
        vcourse[j] = vcourse_ul.find("li:eq("+j+")").html();
        vcourse_jiage[j] = Number( vcourse_ul.find("li:eq("+j+") .jiage").text() );
        array.push (vcourse_jiage[j]);

    }

    array.sort (function (a, b){
        if(a > b){
            return asc;
        }else if (a < b){
            return -asc;
        }else{
            return 0;
        }
    }); 
    for (var i = 0; i < array.length;i++){
        vcourse_ul.appendChild (array[i]);
    }
}