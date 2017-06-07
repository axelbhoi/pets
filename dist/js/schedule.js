        $(document).ready(function() {
            var name = $('#schedule_clientname');
            var pets = $('#schedule_pets');
            var services = $('#schedule_services');
            var form = $('#scheduleForm');

            var Editname = $('#Editschedule_clientname');
            var Editpets = $('#Editschedule_pets');
            var Editservices = $('#Editschedule_services');
            var Editform = $('#EditscheduleForm');
            $('.datepicker').datetimepicker({
                defaultDate: moment(),
                format: 'YYYY-MM-DD'
            });

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: function(start, end, timezone, callback){
                        $.ajax({
                            url: base_url + "calendar/getSchedules",
                            dataType: 'json',
                            data: {
                                // our hypothetical feed requires UNIX timestamps
                                start: start.format(),
                                end: end.format()

                            },
                            beforeSend : function (){
                                $.blockUI({ message: "<h5><img src='"+base_url+"img/busy.gif' /> Just a moment...</h5>" });
                            },   
                            success: function(docs) {
                                var events = [];
                                //callback(events);
                                $(docs).each(function(i,val){
                                    events.push({id:val.id,title:val.schedule_clientname,start:val.schedule_dates,pets:val.schedule_pets,services:val.schedule_services});
                                });
                                callback(events);
                            },
                            complete : function (){
                                $.unblockUI();
                            }            
                        });
                       
                },
                eventClick: function(event){

                    Editname.val(event.title);
                    Editpets.val(event.pets);
                    Editservices.val(event.services);
                    var d = new Date(event.start);
                    var str = $.datepicker.formatDate('yy-mm-dd', d);
                    
                    $('#Editschedule_dates').val(str);
                    $('#schedule_id').val(event.id);
                    $('#delete_id').val(event.id);
                    $('#EditScheduleModal').modal('show');
                }
            });

/*********************************** ADD SCHEDULE **************************************/            
            $('#addSchedule-btn').click(function(){
                $('#addScheduleModal').modal('show');
            });
            
            $('#closeSchedule').click(function(e){
                name.val("");
                pets.val("");
                services.val("");
                $('#addScheduleModal').modal('hide');
            });

            $('#saveSchedule').click(function(e){
                e.preventDefault();
                
                if( (name.val() == "") || ( $('#schedule_dates').val() == ""))
                {
                    if(name.val() == ""){
                        name.addClass('text-error');    
                    }
                    if($('#schedule_dates').val() == ""){
                        $('#schedule_dates').addClass('text-error');
                    }
                }
                else
                {
                        $.ajax({
                            type: "POST",
                            url: base_url + "calendar/addSchedules",
                            data: form.serialize(),
                            beforeSend : function (){
                                $.blockUI({ message: "<h5><img src='"+base_url+"img/busy.gif' /> Just a moment...</h5>" });
                            },   
                            success: function(docs) {
                                if(docs)
                                {
                                    $("#calendar").fullCalendar("refetchEvents");
                                    name.val("");
                                    pets.val("");
                                    services.val("");

                                    $('#addScheduleModal').modal('hide');
                                }
                            },
                            complete : function (){
                                $.unblockUI();
                            }            
                        });
                }
        
            });

            name.focus(function(e){
                e.preventDefault();
                name.removeClass('text-error');
            });

            $('#schedule_dates').focus(function(e){
                e.preventDefault();
                $('#schedule_dates').removeClass('text-error');
            }); 


/************************************* EDIT SCHEDULE **************************************/            
            $('#EditsaveSchedule').click(function(e){
                e.preventDefault();

                if( (Editname.val() == "") || ($('#Editschedule_dates').val() == "") )
                {
                    if(Editname.val() == "")
                    {
                        Editname.addClass('text-error');    
                    }
                    if($('#Editschedule_dates').val() == "")
                    {
                        $('#Editschedule_dates').addClass('text-error');
                    }
                }   
                else
                {
                        $.ajax({
                            type: "POST",
                            url: base_url + "calendar/editSchedules",
                            data: Editform.serialize(),
                            beforeSend : function (){
                                $.blockUI({ message: "<h5><img src='"+base_url+"img/busy.gif' /> Just a moment...</h5>" });
                            },   
                            success: function(docs) {
                                if(docs)
                                {
                                    $("#calendar").fullCalendar("refetchEvents");
                                    $('#EditScheduleModal').modal('hide');
                                }
                            },
                            complete : function (){
                                $.unblockUI();
                            }            
                        });
                }
            });

            Editname.focus(function(e){
                e.preventDefault();
                Editname.removeClass('text-error');
            });

            $('#Editschedule_dates').focus(function(e){
                e.preventDefault();
                $('#Editschedule_dates').removeClass('text-error');                
            });

        
/************************************ DELETE SCHEDULE ***********************************/
            $('#DeleteSchedule').click(function(e){
                e.preventDefault();

                        $.ajax({
                            type: "POST",
                            url: base_url + "calendar/deleteSchedules",
                            data: $('#deleteForm').serialize(),
                            beforeSend : function (){
                                $.blockUI({ message: "<h5><img src='"+base_url+"img/busy.gif' /> Just a moment...</h5>" });
                            },   
                            success: function(docs) {
                                if(docs)
                                {
                                    $("#calendar").fullCalendar("refetchEvents");
                                    $('#EditScheduleModal').modal('hide');
                                }
                            },
                            complete : function (){
                                $.unblockUI();
                            }            
                        });                
            });
            
        });




            