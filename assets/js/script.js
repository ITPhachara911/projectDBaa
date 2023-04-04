$(function(){
    var provinceObject = $('#province');
    var amphureObject = $('#amphure');
    var districtObject = $('#district');
    var showzip = $('#zipcode');
    // on change province
    provinceObject.on('change', async function(){

        let html1 = '';
        await $('#zipcodenom').html(html1);
        var provinceId = $(this).val();

        amphureObject.html('<option value="">เลือกอำเภอ</option>');
        districtObject.html('<option value="">เลือกตำบล</option>');

        $.get('../functions/get_amphure.php?province_id=' + provinceId, function(data){
            var result = JSON.parse(data);
            $.each(result, function(index, item){
                amphureObject.append(
                    $(`<option></option>`).val(item.id).html(item.name_th)
                );
            });
        });
    });

    // on change amphure
    amphureObject.on('change', function(){

        var amphureId = $(this).val();
        districtObject.html('<option value="">เลือกตำบล</option>');
        
        $.get('../functions/get_district.php?amphure_id=' + amphureId,function(data){
            var result = JSON.parse(data);
   
            $.each(result, function(index, item){
                districtObject.append(
                    $('<option></option>').val(item.id).html(item.name_th)
                );
            });
        });
    });

    districtObject.on('change' ,function(){
        var tumbol = $(this).val();
        var settings = {
            "url": `../functions/get_zipcode.php?id=${tumbol}`,
            "method": "GET",
            "timeout": 0,
          };
          
          $.ajax(settings).done(function (response) {
            var result =  JSON.parse(response);
            showzip.append(
                $('#valzip').val(result[0].zip_code).html(result[0].zip_code)
                // $('<p class="mt-2" id="zipcodenom" style=" font-size="50px" "></p>').html(result[0].zip_code)
            );
            console.log(result[0].zip_code)
          });
    });
    
    
});





