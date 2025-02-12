class Slider {
    constructor(id, images, options = {}) {
        this.el = document.getElementById(id);
        if (!this.el) {
            throw new Error(`Element with id "${id}" was not found.`);
        }
        
        this.images = images;
        this.totalImages = images.length;
        this.current = 0;
        this.previous = {
            text: options.previous?.text ?? '<',
            ariaLabel: options.previous?.ariaLabel ?? 'Previous slide',
        };
        this.next = {
            text: options.next?.text ?? '>',
            ariaLabel: options.next?.ariaLabel ?? 'Next slide',
        };

        this.el.classList.add('slider');
        this.addContainer();
        this.addNavigation();
    }

    addContainer() {
        this.container = document.createElement("div");
        this.container.classList.add('slider-images');

        const fragment = document.createDocumentFragment();

        this.images.forEach((image, key)=> {
            let div = document.createElement("div");
            div.classList.add('slider-image');

            let img = document.createElement("img");
            img.setAttribute('src', image);
            div.appendChild(img);
            
            fragment.appendChild(div);
        })

        this.container.appendChild(fragment);
        this.el.appendChild(this.container);
    }

    addNavigation() {
        this.nav = document.createElement("div");
        this.nav.classList.add('slider-nav');

        this.addPrevious();
        this.addNext();
        this.addSelects();
       
        this.el.appendChild(this.nav);
    }

    addPrevious() {
        let previous = document.createElement("button");
        previous.innerHTML = this.previous.text;
        previous.setAttribute('aria-label', this.previous.ariaLabel);
        previous.addEventListener('click', ()=> {
            this.current = (this.current == 0) ? (this.totalImages - 1) : this.current - 1;
            this.translate();
            this.changeActive();
        });
        this.nav.appendChild(previous);
    }

    addNext() {
        let next = document.createElement("button");
        next.innerHTML = this.next.text;
        next.setAttribute('aria-label', this.next.ariaLabel);
        next.addEventListener('click', ()=> {
            this.current = (this.current == (this.totalImages - 1)) ? 0 : this.current + 1;
            this.translate();
            this.changeActive();
        });
        this.nav.appendChild(next);
    }

    addSelects() {
        let div = document.createElement("div");
        div.classList.add('slider-selects');

        const fragment = document.createDocumentFragment();

        this.images.forEach((image, key)=> {
            let button = document.createElement("button");

            button.addEventListener('click', ()=> {
                this.current = key;
                this.translate();
                this.changeActive();
            })

            if(key == 0) {
                button.classList.add('active');
            }

            fragment.appendChild(button);
        })

        div.appendChild(fragment);
        this.nav.appendChild(div);
    }

    translate() {
        this.container.style.transform = `translateX(-${this.current * 100}%)`;
    }

    changeActive() {
        const buttons = this.nav.querySelectorAll('.slider-selects button');

        buttons.forEach(btn => btn.classList.remove('active'));

        buttons[this.current].classList.add('active');
    }
}
