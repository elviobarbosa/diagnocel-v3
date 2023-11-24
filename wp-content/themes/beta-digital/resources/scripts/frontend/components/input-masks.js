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
        console.log(this.selector)
        const form = document.querySelector(this.selector);

        if (form) {
            this.initPhoneMask(form);
            this.initCpfMask(form);
            this.initCnpjMask(form);
        }
    }
    
    initPhoneMask(form) {
        const phone = form.querySelector(this.selectors.phone);

        if (phone) {
            phone.addEventListener('keyup', (e) => {
                const phoneVal = e.target;

                setTimeout(function() {
                    let value = phoneVal.value;
                    value = value.replace(/\D/g,""); //Remove tudo o que não é dígito
                    value = value.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
                    value = value.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
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
                    value = value.replace(/\D/g,""); //Remove tudo o que não é dígito
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
                    value = value.replace(/\D/g,""); //Remove tudo o que não é dígito
                    value = value.replace(/^(\d{2})(\d)/,"$1.$2"); //Coloca ponto entre o segundo e o terceiro dígitos
                    value = value.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3"); //Coloca ponto entre o quinto e o sexto dígitos
                    value = value.replace(/\.(\d{3})(\d)/,".$1/$2"); //Coloca barra entre o oitavo e o nono dígitos
                    value = value.replace(/(\d{4})(\d)/,"$1-$2"); //Coloca hífen entre o décimo segundo e o décimo terceiro dígitos
                    cnpjVal.value = value;
                }, 1)
            });
        }
    }
}
