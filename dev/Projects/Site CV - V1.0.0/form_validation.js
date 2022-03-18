class FormContact {
    constructor(formId, inputNameId, inputEmailId, inputMessageId) {
        this.form = document.getElementById(formId);
        this.inputName = document.getElementById(inputNameId);
        this.inputEmail = document.getElementById(inputEmailId);
        this.inputMessage = document.getElementById(inputMessageId);

        this.initForm();
    }
    initForm() {
        this.form.addEventListener("submit", (event) => {
            event.preventDefault();
            let formDataValid = true;
            if (!this.isValidName(this.inputName.value)) {
                this.displayValueError(this.inputName);
                formDataValid = false;
            }
            if (!this.isValidEmail(this.inputEmail.value)) {                
                formDataValid = false;
            }
            if (!this.isValidMessage(this.inputMessage.value)) {                
                formDataValid = false;
            }
            if (formDataValid) {
                alert("Le message à été envoyé !");
            }
            else {
                alert("Erreur : données incorrect !");
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
    displayValueError(input) {
        
    }

}

let formContact = new FormContact(
    "form-contact",
    "lname",
    "email",
    "message"
);