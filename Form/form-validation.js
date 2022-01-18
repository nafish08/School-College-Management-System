function check() {
    //storing form's each fields data into new variables by name
    var student_name = document.form.sname.value;
    var student_class = document.form.sclass.value;
    // var student_section = document.form.ssection.value;
    // var student_roll = document.form.sroll.value;
    var father_name = document.form.fname.value;
    var father_nid = document.form.fnid.value;
    var father_contact = document.form.fcontact.value;
    var mother_name = document.form.mname.value;
    var mother_nid = document.form.mnid.value;
    var mother_contact = document.form.mcontact.value;
    // var sg_name = document.form.sgname.value;
    // var sg_nid = document.form.sgnid.value;
    // var sg_contact = document.form.sgcontact.value;
    var dateofbirth = document.form.dob.value;
    var birthcirtificate = document.form.brn.value;
    var blood_group = document.form.bloodgrp.value;
    var emergency = document.form.econtact.value;
    var address = document.form.address.value;

    //alter system if any field empty or someting wrong.
    if (student_name == "") {
        alert("Student Name Field can not be empty");
        return false;
    }
    if (student_class == "") {
        alert("Student Class Field can not be empty");
        return false;
    }
    // if (student_section == "") {
    //     alert("Student Section Field can not be empty");
    //     return false;
    // }
    // if (student_roll == "") {
    //     alert("Student Roll Field can not be empty");
    //     return false;
    // }
    if (father_name == "") {
        alert("Father's Name Field can not be empty");
        return false;
    }
    if (father_nid == "") {
        alert("Father's NID Field can not be empty");
        return false;
    }
    if (father_contact == "") {
        alert("Father's Contact Field can not be empty");
        return false;
    }
    if (mother_name == "") {
        alert("Mother's Name Field can not be empty");
        return false;
    }
    if (mother_nid == "") {
        alert("Mother's NID Field can not be empty");
        return false;
    }
    if (mother_contact == "") {
        alert("Mother's Contact Field can not be empty");
        return false;
    }
    if (dateofbirth == "") {
        alert("Date of Birth Field can not be empty");
        return false;
    }
    if (birthcirtificate == "") {
        alert("Birth Cirtificate No Field can not be empty");
        return false;
    }
    if (blood_group == "") {
        alert("Blood Group Field can not be empty");
        return false;
    }
    if (emergency == "") {
        alert("Emergency Contact Field can not be empty");
        return false;
    }
    if (address == "") {
        alert("Emergency Contact Field can not be empty");
        return false;
    }

    var result = confirm('Are you sure?');
    if (result == false) {
        event.preventDefault();
    }

}
