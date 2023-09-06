<html>
<head>
    <title>getprogrammedetails</title>
    <link href="/sms/css/getprogrammedetails.css"  rel = "stylesheet"></link>
    <link href="/sms/global/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <main>
        <div class = "heading">
            PROGRAMME DETAILS 
        </div>
        <div id = "contentdiv" class="test1">

        </div>
    </main>
    <div class="modal" id="modalprogramme">
        <div class="modal-dialog">
            <div class = "modal-content">
                <div class="modal-header">
                    PROGRAMME DETAILS
                    <button class="btn btn-danger" data-bs-dismiss="modal">X</button>
                </div>
                        <div class="modal-body">
                            <div class="myinputelement">
                                <label >CODE</label>
                                <input id ="txtcode" type="text">
                            </div>
                            <div class="myinputelement">
                                <label>TITLE</label>
                                <input id ="txttitle" type="text">
                            </div>
                            <div class="myinputelement">
                                <label>NUMBER OF SEMESTER</label>
                                <input id ="txtnos" type="text">
                            </div>
                            <div class="myinputelement">
                                <label>DEPARTMENT</label>
                                <select id="dddepartment">
                                   
                                </select>
                            </div>
                            <div class="myinputelement">
                                <label>TECHNICAL LEVEL</label>
                                <select id ="ddtl">
                                    <option value="NONE">NONE</option>
                                    <option value="BTECH">BTECH</option>
                                    <option value="MTECH">MTECH</option>
                                    
                                </select>
                            </div>
                            <div class="myinputelement">
                                <label>GRADUATION LEVEL</label>
                                <select id ="ddgl">
                                    <option value="NONE">NONE</option>
                                    <option value="UG">UG</option>
                                    <option value="PG">PG</option>
                                    <option value="PHD">PHD</option>
                                </select>
                            </div>
                            <hidden id="flag">
                            <hidden id="pid">
                        </div>
                    <div class="modal-footer">
                       <button class="btn btn-danger" data-bs-dismiss="modal">CANCEL</button>
                       <button class="btn btn-success" id="btnsave">SAVE</button>
                    </div>
            </div>
       </div> 
    </div>
    <div>
        <script src="/sms/global/jquery.js"></script>
        <script src="/sms/js/getprogrammedetails.js"></script>
        <script src="/sms/global/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </div>
</body>
</html>