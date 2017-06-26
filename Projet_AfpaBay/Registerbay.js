/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var btn_creer = document.getElementById('register');

btn_creer.addEventListener('click', create_register);
btn_creer.addEventListener('click', function(){this.remove();});

console.log('script actif');

function create_register(){
    var divform = document.getElementById('regformdiv');
    var formulaire = document.getElementById('register_form');
    var divID = document.createElement('div');
    var divPW = document.createElement('div');
    var divconfirmPW = document.createElement('div');
    var divAge = document.createElement('div');
    var spanID = document.createElement('span');
    var spanPW = document.createElement('span');
    var spanconfirmPW = document.createElement('span');
    var spanOKPW = document.createElement('span');
    var spanAge = document.createElement('span');
    var identifiant = document.createElement('input');
    var mdp = document.createElement('input');
    var confirm_mdp = document.createElement('input');
    var age = document.createElement('input');
    var glyphID = document.createElement('i');
    var glyphPW = document.createElement('i');
    var glyphconfirmPW = document.createElement('i');
    var glyphAge = document.createElement('i');
    var btn_submit = document.createElement('button');
    var formH = document.createElement('h3');
    var Htext = document.createTextNode('Renseignez tous les champs pour vous inscrire');
    formH.appendChild(Htext);
    
    formH.className = 'col-xs-12 bg-info';
    identifiant.type = 'text';
    identifiant.className = 'form-control';
    identifiant.placeholder = 'Entrez un identifiant';
    identifiant.name = 'newuserID';
    confirm_mdp.type = 'password';
    confirm_mdp.id = 'confpw';
    confirm_mdp.name = 'confirmpassword';
    confirm_mdp.className = 'form-control';
    confirm_mdp.placeholder = 'confirmez votre mot de passe';
    mdp.type = 'password';
    mdp.id = 'PW';
    mdp.name = 'newpassword';
    mdp.className = 'form-control';
    mdp.placeholder = 'Entrez un mot de passe';
    age.type = 'number';
    age.className = 'form-control';
    age.placeholder = 'Entrez votre age';
    age.name = 'newuserage';
    divID.className = 'input-group';
    divPW.className = 'input-group';
    divconfirmPW.className = 'has-feedback input-group';
    divAge.className = 'input-group';
    spanID.className = 'input-group-addon';
    glyphID.className = 'glyphicon glyphicon-info-sign';
    glyphPW.className = 'glyphicon glyphicon-edit';
    glyphconfirmPW.className = 'glyphicon glyphicon-ok-circle';
    glyphAge.className = 'glyphicon glyphicon-tower';
    spanPW.className = 'input-group-addon';
    spanconfirmPW.className = 'input-group-addon';
    spanOKPW.className = 'glyphicon glyphicon-ok form-control-feedback';
    spanOKPW.id = 'spanOKPW';
    spanAge.className = 'input-group-addon';
    btn_submit.type = 'submit';
    btn_submit.className = 'btn btn-success btn-lg';
    btn_submit.textContent = 'Valider';
    console.log('OK1');
    
    spanID.appendChild(glyphID);
    divID.appendChild(spanID);
    divID.appendChild(identifiant);
    spanPW.appendChild(glyphPW);
    divPW.appendChild(spanPW);
    divPW.appendChild(mdp);
    spanconfirmPW.appendChild(glyphconfirmPW);
    divconfirmPW.appendChild(spanconfirmPW);
    divconfirmPW.appendChild(confirm_mdp);
    divconfirmPW.appendChild(spanOKPW);
    spanAge.appendChild(glyphAge);
    divAge.appendChild(spanAge);
    divAge.appendChild(age);    
    formulaire.appendChild(divID);
    formulaire.appendChild(divAge);
    formulaire.appendChild(divPW);
    formulaire.appendChild(divconfirmPW);
    formulaire.appendChild(btn_submit);
    divform.insertBefore(formH, formulaire);
    mdp.addEventListener('keyup', check_pw);
    confirm_mdp.addEventListener('keyup', check_pw);
    btn_submit.addEventListener('click', function(event){
        console.log('FUNCTION VALIDATE START');
        var PW = document.getElementById('PW').value;
        var PWconf = document.getElementById('confpw').value;
        if ( PW !== PWconf && PW !== ''){ alert('Les mot de passe ne sont pas identiques !');
                             event.preventDefault();   
        }});
    console.log('OK2');
}   
  
function check_pw(){
    console.log('FUNCTION START')
    var PW = document.getElementById('PW');
    var PWconf = document.getElementById('confpw');
    var spanOKPW = document.getElementById('spanOKPW');
    if (PW.value !== '' && PWconf !== '');{
        console.log('FIRST IF')
        if (PW.value === PWconf.value){
            console.log('DEUXIEME IF')
            spanOKPW.parentNode.className = 'has-success has-feedback input-group';
            spanOKPW.className = 'glyphicon glyphicon-ok form-control-feedback';     
        } else { spanOKPW.className = 'glyphicon glyphicon-remove form-control-feedback';
        spanOKPW.parentNode.className = 'has-error has-feedback input-group';}
    }
}




 