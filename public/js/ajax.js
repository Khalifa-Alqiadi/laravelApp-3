$(document).ready(function(){
    fetchSkill();
    fetchExperience();
    // Start Skill
    function fetchSkill(){
        $.ajax({
            type: 'GET',
            url: 'showSkills',
            dataType: 'json',
            success: function(response){
                $('ul.list-skill').html("");
                $.each(response.skills, function(key, item){
                    $('ul.list-skill').append(
                        `<li class="d-flex justify-content-between align-items-center">\
                        <p class="m-0">`+item.name+`</p>\
                        <p class="m-0">`+item.percent+`%</p>\
                        <p class="m-0">\
                            <button type="button" value="`+item.id+`" class="btn btn-primary py-0 edit_skill" data-bs-toggle="modal" data-bs-target="#editSkill">\
                                <i class="fa fa-edit"></i>Edit \  
                            </button>\
                            <button type="button" value="`+item.id+`" class='btn btn-danger py-0 delete_skill' data-bs-toggle="modal" data-bs-target="#deleteSkill">
                                <i class='fa fa-delete'></i> Delete
                            </button> 
                        </p>
                        
                        
                    </li>`
                    );
                });
            }
        })
    }
    $("#skill_form").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function(){
                $(document).find('span.error-text').text('');
            },
            success:function(data){
                if(data.status == 0){
                    $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    })
                }else{
                    $('#skill_form')[0].reset();
                    $('.success-text').text(data.success);
                    fetchSkill();
                }
            }
        })
    });
    $('.edit_skill_user').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            beforeSend: function(){
                $(document).find('span.error-text').text('');
            },
            success:function(response){
                if(response.status == 0){
                    $.each(response.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    })
                }else{
                    // $('.edit_skill_user')[0].reset();
                    $('.success-text').text(response.success);
                    fetchSkill();
                }
            }
        })
    });
    $(document).on('click', '.edit_skill', function(e){
        e.preventDefault();
        var skill_id = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/edit_skill/'+skill_id,
            success:function(response){
                if(response.status == 0){
                    $('.success-text').text(response.error);
                }else{
                    $('#edit_skill_id').val(response.skill.id);
                    $('#edit_name').val(response.skill.name);
                    $('#edit_percent').val(response.skill.percent);
                }
            }
        })
    })
    $(document).on('click', '.delete_skill', function(e){
        e.preventDefault();
        var skill_id = $(this).val();
        $('#delete_skill_id').val(skill_id);
    });
    $('.delete_skill_user').on('submit', function(e){
        e.preventDefault();
        let data = {
            'id': $('#delete_skill_id').val(),
        }
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            success:function(response){
                if(response.status == 0){
                    $('.success-text').text(response.error);
                }else{
                    // $('.edit_skill_user')[0].reset();
                    $('.success-text').text(response.success);
                    fetchSkill();
                    $('#deleteSkill').removeClass('show');
                }
            }
        })
    });
    // End Skill
    // Start Experience
    function fetchExperience(){
        $.ajax({
            type: 'GET',
            url: 'showExperience',
            dataType: 'json',
            success: function(response){
                $('ul.list-experience').html("");
                $.each(response.experience, function(key, item){
                    $('ul.list-experience').append(
                        `<li class="d-flex justify-content-between align-items-center">\
                        <p class="m-0">`+item.name+`</p>\
                        <p class="m-0">`+item.years+` year</p>\
                        <p class="m-0">\
                            <button type="button" value="`+item.id+`" class="btn btn-primary py-0 edit_experience" data-bs-toggle="modal" data-bs-target="#editExperience">\
                                <i class="fa fa-edit"></i>Edit \  
                            </button>\
                            <button type="button" value="`+item.id+`" class='btn btn-danger py-0 delete_experience' data-bs-toggle="modal" data-bs-target="#deleteExperience">
                                <i class='fa fa-delete'></i> Delete
                            </button> 
                        </p>
                    </li>`
                    );
                });
            }
        })
    }
    $("#add_experience_user").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function(){
                $(document).find('span.error-text').text('');
            },
            success:function(data){
                if(data.status == 0){
                    $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    })
                }else{
                    $('.success-text').text(data.success);
                    fetchExperience();
                }
            }
        })
    });
    $('.edit_experience_user').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            beforeSend: function(){
                $(document).find('span.error-text').text('');
            },
            success:function(response){
                if(response.status == 0){
                    $.each(response.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    })
                }else{
                    // $('.edit_skill_user')[0].reset();
                    $('.success-text').addClass('alert alert-success');
                    $('.success-text').text(response.success);
                    fetchExperience();
                }
            }
        })
    });
    $(document).on('click', '.edit_experience', function(e){
        e.preventDefault();
        var experience_id = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/edit_experience/'+experience_id,
            success:function(response){
                if(response.status == 0){
                    $('.success-text').text(response.error);
                }else{
                    $('#experienceid').val(response.experience.id);
                    $('#edit_experience_name').val(response.experience.name);
                    $('#edit_year').val(response.experience.years);
                }
            }
        })
    });
    $(document).on('click', '.delete_experience', function(e){
        e.preventDefault();
        var experience_id = $(this).val();
        $('#experience_id').val(experience_id);
    });
    $('.delete_experience_user').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            success:function(response){
                if(response.status == 0){
                    $('.success-text').text(response.error);
                }else{
                    // $('.edit_skill_user')[0].reset();
                    $('.success-text').text(response.success);
                    fetchExperience();
                    $('#deleteExperience').removeClass('show');
                }
            }
        })
    });
    // End Experience
});


