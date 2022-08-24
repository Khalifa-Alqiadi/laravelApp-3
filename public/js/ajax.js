$(document).ready(function () {
    fetchSkill();
    fetchExperience();
    // Start Skill
    function fetchSkill() {
        $.ajax({
            type: 'GET',
            url: 'showSkills',
            dataType: 'json',
            success: function (response) {
                $('ul.list-skill').html("");
                $.each(response.skills, function (key, item) {
                    $('ul.list-skill').append(
                        `<li class="d-flex justify-content-between align-items-center">\
                        <p class="m-0">` + item.name + `</p>\
                        <p class="m-0">` + item.percent + `%</p>\
                        <p class="m-0">\
                            <button type="button" value="` + item.id + `" class="btn btn-primary py-0 edit_skill" data-bs-toggle="modal" data-bs-target="#editSkill">\
                                <i class="fa fa-edit"></i>Edit \  
                            </button>\
                            <button type="button" value="` + item.id + `" class='btn btn-danger py-0 delete_skill' data-bs-toggle="modal" data-bs-target="#deleteSkill">
                                <i class='fa fa-delete'></i> Delete
                            </button> 
                        </p>
                        
                        
                    </li>`
                    );
                });
            }
        })
    }
    $("#skill_form").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    })
                } else {
                    $('#skill_form')[0].reset();
                    $('.success-text').text(data.success);
                    fetchSkill();
                }
            }
        })
    });
    $('.edit_skill_user').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (response) {
                if (response.status == 0) {
                    $.each(response.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    })
                } else {
                    // $('.edit_skill_user')[0].reset();
                    $('.success-text').text(response.success);
                    fetchSkill();
                }
            }
        })
    });
    $(document).on('click', '.edit_skill', function (e) {
        e.preventDefault();
        var skill_id = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/edit_skill/' + skill_id,
            success: function (response) {
                if (response.status == 0) {
                    $('.success-text').text(response.error);
                } else {
                    $('#edit_skill_id').val(response.skill.id);
                    $('#edit_name').val(response.skill.name);
                    $('#edit_percent').val(response.skill.percent);
                }
            }
        })
    })
    $(document).on('click', '.delete_skill', function (e) {
        e.preventDefault();
        var skill_id = $(this).val();
        $('#delete_skill_id').val(skill_id);
    });
    $('.delete_skill_user').on('submit', function (e) {
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
            success: function (response) {
                if (response.status == 0) {
                    $('.success-text').text(response.error);
                } else {
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
    function fetchExperience() {
        $.ajax({
            type: 'GET',
            url: 'showExperience',
            dataType: 'json',
            success: function (response) {
                $('ul.list-experience').html("");
                $.each(response.experience, function (key, item) {
                    $('ul.list-experience').append(
                        `<li class="d-flex justify-content-between align-items-center">\
                        <p class="m-0">` + item.name + `</p>\
                        <p class="m-0">` + item.years + ` year</p>\
                        <p class="m-0">\
                            <button type="button" value="` + item.id + `" class="btn btn-primary py-0 edit_experience" data-bs-toggle="modal" data-bs-target="#editExperience">\
                                <i class="fa fa-edit"></i>Edit \  
                            </button>\
                            <button type="button" value="` + item.id + `" class='btn btn-danger py-0 delete_experience' data-bs-toggle="modal" data-bs-target="#deleteExperience">
                                <i class='fa fa-delete'></i> Delete
                            </button> 
                        </p>
                    </li>`
                    );
                });
            }
        })
    }
    $("#add_experience_user").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    })
                } else {
                    $('#add_experience_user')[0].reset();
                    $('.success-text').text(data.success);
                    fetchExperience();
                }
            }
        })
    });
    $('.edit_experience_user').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (response) {
                if (response.status == 0) {
                    $.each(response.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    })
                } else {
                    // $('.edit_skill_user')[0].reset();
                    $('.success-text').addClass('alert alert-success');
                    $('.success-text').text(response.success);
                    fetchExperience();
                }
            }
        })
    });
    $(document).on('click', '.edit_experience', function (e) {
        e.preventDefault();
        var experience_id = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/edit_experience/' + experience_id,
            success: function (response) {
                if (response.status == 0) {
                    $('.success-text').text(response.error);
                } else {
                    $('#experienceid').val(response.experience.id);
                    $('#edit_experience_name').val(response.experience.name);
                    $('#edit_year').val(response.experience.years);
                }
            }
        })
    });
    $(document).on('click', '.delete_experience', function (e) {
        e.preventDefault();
        var experience_id = $(this).val();
        $('#experience_id').val(experience_id);
    });
    $('.delete_experience_user').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            success: function (response) {
                if (response.status == 0) {
                    $('.success-text').text(response.error);
                } else {
                    // $('.edit_skill_user')[0].reset();
                    $('.success-text').text(response.success);
                    fetchExperience();
                    $('#deleteExperience').removeClass('show');
                }
            }
        })
    });
    // End Experience
    // Start Qualifcations
    function fetchQualifcations() {
        $.ajax({
            type: 'GET',
            url: 'showQualifcations',
            dataType: 'json',
            success: function (response) {
                $('ul.list-qualifcations').html("");
                $.each(response.qualifcations, function (key, item) {
                    $('ul.list-qualifcations').append(
                        `<li class="d-flex justify-content-between align-items-center">\
                        <p class="m-0">` + item.name + `</p>\
                        <p class="m-0">` + item.depart + `</p>\
                        <p class="m-0">` + item.university + `</p>\
                        <p class="m-0">\
                            <button type="button" value="` + item.id + `" class="btn btn-primary py-0 edit_qualifcation" data-bs-toggle="modal" data-bs-target="#editQualifcations">\
                                <i class="fa fa-edit"></i>Edit \  
                            </button>\
                            <button type="button" value="` + item.id + `" class='btn btn-danger py-0 delete_qualifcation' data-bs-toggle="modal" data-bs-target="#deleteQualifcations">
                                <i class='fa fa-delete'></i> Delete
                            </button> 
                        </p>
                    </li>`
                    );
                });
            }
        })
    }
    fetchQualifcations();

    $('.add_qualifcations_user').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                        console.log(data.error)
                    })
                } else {

                    $('.success-text').text(data.success);
                    fetchQualifcations();
                    fetchModals('#addQualifcations');
                }
            }
        })
    });

    $(document).on('click', '.edit_qualifcation', function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/edit_qualifcations/' + id,
            success: function (response) {
                if (response.status == 0) {
                    $('.success-text').text(response.error);
                } else {
                    $('#qualifcation_id').val(response.qualifcation.id);
                    $('#edit_qualifcation_name').val(response.qualifcation.name);
                    $('#edit_qualifcation_depart').val(response.qualifcation.depart);
                    $('#edit_qualifcation_university').val(response.qualifcation.university);
                }
            }
        })
    });

    $('.edit_qualifcations_user').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (response) {
                if (response.status == 0) {
                    $.each(response.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    })
                } else {
                    $('.success-text').addClass('alert alert-success');
                    $('.success-text').text(response.success);
                    fetchQualifcations();
                    fetchModals('#editQualifcations');
                }
            }
        })
    });
    $(document).on('click', '.delete_qualifcation', function (e) {
        e.preventDefault();
        var id = $(this).val();
        $('#delete_qualifcation_id').val(id);
    });
    $('.delete_qualifcation_user').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            success: function (response) {
                if (response.status == 0) {
                    $('.success-text').text(response.error);
                } else {
                    $('.success-text').addClass('alert alert-success');
                    $('.success-text').text(response.success);
                    fetchQualifcations();
                    fetchModals('.modal');
                }
            }
        })
    });
    // End Qualifcations
    // Start Courses
    function fetchCourses() {
        $.ajax({
            type: 'GET',
            url: 'showCourses',
            dataType: 'json',
            success: function (response) {
                $('ul.list-courses').html("");
                $.each(response.courses, function (key, item) {
                    $('ul.list-courses').append(
                        `<li class="d-flex justify-content-between align-items-center">\
                        <p class="m-0">` + item.name + `</p>\
                        <p class="m-0">\
                            <button type="button" value="` + item.id + `" class="btn btn-primary py-0 edit_course" data-bs-toggle="modal" data-bs-target="#editCourses">\
                                <i class="fa fa-edit"></i>Edit \  
                            </button>\
                            <button type="button" value="` + item.id + `" class='btn btn-danger py-0 delete_course' data-bs-toggle="modal" data-bs-target="#deleteCourses">
                                <i class='fa fa-delete'></i> Delete
                            </button> 
                        </p>
                    </li>`
                    );
                });
            }
        })
    }
    fetchCourses();
    $('.add_Courses_user').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    })
                } else {
                    $('.success-text').text(data.success);
                    fetchCourses();
                    fetchModals('#addCourses');
                }
            }
        })
    });
    $(document).on('click', '.edit_course', function (e) {
        e.preventDefault();
        var id = $(this).val();

        $.ajax({
            type: 'GET',
            url: '/edit_course/' + id,
            success: function (response) {
                console.log(response)
                if (response.status == 0) {
                    $('.success-text').text(response.error);
                } else {
                    $('#course_id').val(response.course.id);
                    $('#edit_course_name').val(response.course.name);
                }
            }
        })
    });
    $('.edit_Courses_user').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (response) {
                if (response.status == 0) {
                    $.each(response.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    })
                } else {
                    $('.success-text').addClass('alert alert-success');
                    $('.success-text').text(response.success);
                    fetchCourses();
                    fetchModals('#editCourses');
                }
            }
        })
    });
    $(document).on('click', '.delete_course', function (e) {
        e.preventDefault();
        var id = $(this).val();
        $('#delete_course_id').val(id);
    });
    $('.delete_course_user').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            success: function (response) {
                if (response.status == 0) {
                    $('.success-text').text(response.error);
                } else {
                    $('.success-text').addClass('alert alert-success');
                    $('.success-text').text(response.success);
                    fetchCourses();
                    fetchModals('#deleteCourses');
                }
            }
        })
    });
    // End Courses

    function fetchModals(modal) {
        $('.fade').removeClass('show');
        $(modal).style.display = 'none';
    }
});
