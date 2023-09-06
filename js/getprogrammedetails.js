function gethtml(result)
{

    let x = ``;
    x = x + `<div class="addnew"><button id="btnAddNew" class = "btn btn-primary">ADD NEW</button></div>`;
    x = x + `<table class="table table-striped">`;
    let i = 0;
    for(i=0;i<result.length;i++)
    {
        if(i==0)
        {
            x = x + `<thead>
            <th>SLNO</th><th>CODE</th><th>TITLE</th><th>DEPT</th><th>#SEM</th><th>GRDTN_LVL</th>
            <th>TECH_LVL</th>
            <th></th>
            </thead><tbody>`;
        }
        x = x + `<tr>
        <td>${i+1}</td><td>${result[i]['pcode']}</td>
        <td>${result[i]['ptitle']}</td>
        <td>${result[i]['dtitle']}</td>
        <td>${result[i]['nos']}</td>
        <td>${result[i]['gl']}</td>
        <td>${result[i]['tl']}</td>
        <td><button class="btn btn-primary btnEdit"
         data-details='${JSON.stringify(result[i])}'
         >EDIT</button></td>

         <td><button class="btn btn-danger btnDelete"
         data-details='${JSON.stringify(result[i])}'
         >REMOVE</button></td>

        </tr>`;

    }
    x = x+`</tbody></table>`;
  return x;
}


function  getselectbox(result)
{
    let x=``;
    x=x+`<option value= -1>--SELECT ONE--</option>`
    let i=0;
    for(i=0;i<result.length;i++)
    {
         x=x+`<option value=${result[i].did}>${result[i].dtitle}</option>`;
    }
 return x;
}

function getprogrammedetails()
{
    $.ajax({
        url:"/sms/ajax/getprogrammedetailsAJAX.php",
        type:"POST",
        dataType:"JSON",
        data:{a:"21",b:"flower",action1:"getprogrammedetails"},
        beforeSend:function(){
            //alert("about to make an ajax call");
        },
        success:function(result){
            let x = JSON.stringify(result);
            let html = gethtml(result);
            $("#contentdiv").html(html);
        },
        error:function(){alert("Error");}
    });

}

function loadDepartments()
{
    $.ajax({
        url:"/sms/ajax/getprogrammedetailsAJAX.php",
        type:"POST",
        dataType:"JSON",
        data:{action1:"getdepartmentdetails"},
        beforeSend:function(){
            //alert("about to make an ajax call");
        },
        success:function(result){
            let x = JSON.stringify(result);
            //alert(x);
            let html = getselectbox(result);
            $("#dddepartment").html(html);
        },
        error:function(){alert("Error");}
    });
}

function pushtotheserver(txtcode,txttitle,txtnos,dddepartment,ddgl,ddtl)
{
    $.ajax({
        url:"/sms/ajax/getprogrammedetailsAJAX.php",
        type:"POST",
        dataType:"JSON",
        data:{txtcode:txtcode,txttitle:txttitle,mynos:txtnos,dddepartment:dddepartment,ddgl:ddgl,ddtl:ddtl,action1:"saveprogramdetails"},
        beforeSend:function(){
            //alert("about to make an ajax call");
        },
        success:function(result){
           
            let x = JSON.stringify(result);
            if(x=="0")
            {
                alert("Not Inserted");
            }
            else
            {
                alert("Inserted");
                let html = gethtml(result);
                // alert(html);
                $("#contentdiv").html(html);
            }
         
        },
        error:function(){alert("Error");}
    });
}


function updateprogramme(pid,txtcode,txttitle,txtnos,dddepartment,ddgl,ddtl)
{
    $.ajax({
        url:"/sms/ajax/getprogrammedetailsAJAX.php",
        type:"POST",
        dataType:"JSON",
        data:{pid:pid,txtcode:txtcode,txttitle:txttitle,mynos:txtnos,dddepartment:dddepartment,ddgl:ddgl,ddtl:ddtl,action1:"updateprogramdetails"},
        beforeSend:function(){
            //alert("about to make an ajax call");
        },
        success:function(result){
           
            let x = JSON.stringify(result);
            if(x=="0")
            {
                alert("Not Updated");
            }
            else
            {
                alert("Updated");
                let html = gethtml(result);
                // alert(html);
                $("#contentdiv").html(html);
            }
         
        },
        error:function(){alert("Error");}
    });
}



function removeprogramme(pid)
{
    $.ajax({
        url:"/sms/ajax/getprogrammedetailsAJAX.php",
        type:"POST",
        dataType:"JSON",
        data:{pid:pid,action1:"deleteprogramme"},
        beforeSend:function(){
            //alert("about to make an ajax call");
        },
        success:function(result){
           
            let x = JSON.stringify(result);
            if(x=="0")
            {
                alert("Not Removed");
            }
            else
            {
                alert("Removed");
                let html = gethtml(result);
                // alert(html);
                $("#contentdiv").html(html);
            }
         
        },
        error:function(){alert("Error");}
    });
}


$(document).ready(
function()
{
    getprogrammedetails();
    loadDepartments();
    $(document).on("click","#btnAddNew",function(){
        $("#modalprogramme").modal('show');
        $("#flag").val("NEW");
        
    });
    $(document).on("click","#btnsave",function(){
         let txtcode = $("#txtcode").val();
         let txttitle = $("#txttitle").val();
         let txtnos = $("#txtnos").val();
         let dddepartment = $("#dddepartment").val();
         let ddgl= $("#ddgl").val();
         let ddtl = $("#ddtl").val();
         let pid = $("#pid").val();


         if(txtcode!='' && txttitle!='' && txtnos!='' && dddepartment>=0)
         {
            if($("#flag").val()=="NEW")
            {
                pushtotheserver(txtcode,txttitle,txtnos,dddepartment,ddgl,ddtl);
            }
            else
            {
               // alert("Edit Function");
                updateprogramme(pid,txtcode,txttitle,txtnos,dddepartment,ddgl,ddtl);
            }
            
         }
         else
         {
            alert("invalid input");
         }
    });

    $(document).on("keypress","#txtnos",function(e){
        if(!(e.keyCode>=48 && e.keyCode<=57))
        {
            e.preventDefault();
        }
    });

    $(document).on("click",".btnEdit",function(){
        $("#flag").val("EDIT");
        $("#modalprogramme").modal('show');
        let details = $(this).data("details");
        $("#txtcode").val(details["pcode"]);
        $("#txttitle").val(details["ptitle"]);
        $("#txtnos").val(details["nos"]);
        $("#dddepartment").val(details["did"]);
        $("#ddgl").val(details["gl"]);
        $("#ddtl").val(details["tl"]);
        $("#pid").val(details["pid"]);
    });


    $(document).on("click",".btnDelete",function(){
       // alert("Remove " + $(this).data("details")["pid"]);
       let y = confirm("Are you sure ?");
       if(y)
       {
           removeprogramme( $(this).data("details")["pid"]);
       }
       else
       {
        alert("You Cancelled");
       }

    });
}
);