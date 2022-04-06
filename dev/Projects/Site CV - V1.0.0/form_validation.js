class FormContact {
    constructor(formId, inputNameId, inputEmailId, inputMessageId) {
        this.form = document.getElementById(formId);

        this.inputNameId = inputNameId;
        this.inputName = document.getElementById(this.inputNameId);

        this.inputEmailId = inputEmailId;
        this.inputEmail = document.getElementById(this.inputEmailId);
        
        this.inputMessageId = inputMessageId;
        this.inputMessage = document.getElementById(this.inputMessageId);

        this.inputMessages = [];

        this.initForm();
    }
    initForm() {
        this.form.addEventListener("submit", (event) => {
            event.preventDefault();
            this.cancelMessageError();
            let formDataValid = true;
            if (!this.isValidName(this.inputName.value)) {
                this.displayValueError(this.inputNameId, 'Le champs \'Nom\' est invalide !');
                formDataValid = false;
            }
            if (!this.isValidEmail(this.inputEmail.value)) { 
                this.displayValueError(this.inputEmailId, 'Le champs \'Email\' est invalide !');               
                formDataValid = false;
            }
            if (!this.isValidMessage(this.inputMessage.value)) {    
                this.displayValueError(this.inputMessageId, 'Le champs \'Message\' est invalide !');            
                formDataValid = false;
            }
            if (formDataValid) {
                alert("Le message à été envoyé !");
            }
        });
    }
    isValidName(str) {
        let regex = /^(?:\p{L}+)(?:[ |-]?\p{L}+)*$/gmu;
        return regex.test(str);
    }
    isValidEmail(str) {
        let regex = /^[a-zA-Z]+(?:[\.]?[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:[\.]?[a-zA-Z0-9]+)*\.[a-zA-Z0-9]+$/g;
        return regex.test(str);       
    }
    isValidMessage(str) {
        let regex = /^.{10,2000}$/gm;
        return regex.test(str);
    }
    displayValueError(inputId, message) {
        let inputMessage = document.querySelector("#" + inputId + " ~ p");
        inputMessage.innerHTML = message;
        inputMessage.style.display = "block";
        this.inputMessages.push(inputMessage);
    }
    cancelMessageError() {
        this.inputMessages.forEach(element => {
        element.innerHTML = "";
        element.style.display = "none";
    });
    }

}

let formContact = new FormContact(
    "form-contact",
    "lname",
    "email",
    "message"
);