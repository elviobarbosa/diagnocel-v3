export default class InputMasks {

    constructor() {
        this.selector = '.wpcf7-form';

        this.selectors = {
            phone: 'input[type=tel]',
            cpf: 'input[name=cpf]',
            cnpj: 'input[name=CNPJ]'
        };

        this.init();
    }

    init() {
        const forms = document.querySelectorAll(this.selector);

        forms.forEach(form => {
            this.initPhoneMask(form);
            this.initCpfMask(form);
            this.initCnpjMask(form);
        }); 
    }
    
    initPhoneMask(form) {
        const phone = form.querySelector(this.selectors.phone);

        if (phone) {
            phone.addEventListener('keyup', (e) => {
                const phoneVal = e.target;

                setTimeout(function() {
                    let value = phoneVal.value;
                    value = value.replace(/\D/g,""); 
                    value = value.replace(/^(\d{2})(\d)/g,"($1) $2"); 
                    value = value.replace(/(\d)(\d{4})$/,"$1-$2"); 
                    phoneVal.value = value;
                }, 1)
            });
        }
    }

    initCpfMask(form) {
        const cpf = form.querySelector(this.selectors.cpf);

        if (cpf) {
            cpf.addEventListener('keyup', (e) => {
                const cpfVal = e.target;

                setTimeout(function() {
                    let value = cpfVal.value;
                    value = value.replace(/\D/g,"");
                    value = value.replace(/(\d{3})(\d)/,"$1.$2");
                    value = value.replace(/(\d{3})(\d)/,"$1.$2"); 
                    value = value.replace(/(\d{3})(\d{1,2})$/,"$1-$2"); 
                    cpfVal.value = value;
                }, 1)
            });
        }
    }

    initCnpjMask(form) {
        const cnpj = form.querySelector(this.selectors.cnpj);

        if (cnpj) {
            cnpj.addEventListener('keyup', (e) => {
                const cnpjVal = e.target;

                setTimeout(function() {
                    let value = cnpjVal.value;
                    value = value.replace(/\D/g,"");
                    value = value.replace(/^(\d{2})(\d)/,"$1.$2"); 
                    value = value.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3"); 
                    value = value.replace(/\.(\d{3})(\d)/,".$1/$2"); 
                    value = value.replace(/(\d{4})(\d)/,"$1-$2");
                    cnpjVal.value = value;
                }, 1)
            });
        }
    }
}
