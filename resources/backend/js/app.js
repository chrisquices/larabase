import './bootstrap';
import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css";
import TomSelect from "tom-select"
import.meta.glob('./../img/**');
import * as FilePond from 'filepond';
import 'filepond/dist/filepond.min.css';

document.addEventListener('DOMContentLoaded', function () {

    setPublicFunctions();

    setWindowEventListeners();

    setDocumentEventListeners();

    addHiddenAttributeToHiddenInputs();

    // initTomSelect();

    initFilePond();

}, false);

function setPublicFunctions() {
    window.flash = function (icon, message) {
        if (icon === "success") icon = "#059669";
        if (icon === "error") icon = "#dc2626";

        Toastify({
            text: message,
            className: "!rounded-2xl lg:-mt-[7px]",
            duration: 3000,
            gravity: "top",
            position: "center",
            backgroundColor: icon,
        }).showToast();
    }

    window.redirectTo = function (element, redirectTo) {
        if (!redirectTo) return false;

        let targetTagName = element.target.tagName.toLowerCase();
        let targetType = element.target.type;

        if (targetTagName === "input" && targetType === "checkbox") {
            element.stopPropagation();
            return;
        }

        if (targetTagName === "svg" || targetTagName === "path") {
            element.stopPropagation();
            return;
        }

        window.location.href = redirectTo;
    }
}

function setWindowEventListeners() {
    window.addEventListener('confirm', (event) => {
        let modalConfirmText = document.getElementById('modal-confirm-text');
        let modalConfirmBtn = document.getElementById('modal-confirm-btn');

        modalConfirmText.innerText = event.detail.message;
        modalConfirmBtn.setAttribute('wire:click', event.detail.action);

        modalConfirm.showModal();
    });

    window.addEventListener('flash', (event) => {
        flash(event.detail.icon, event.detail.message)
    });
}

function setDocumentEventListeners() {
    document.addEventListener("keydown", function (event) {
        if (event.metaKey && event.keyCode === 191) {
            let globalSearch = document.getElementById('global_search');

            globalSearch.setAttribute("readonly", "true");
            globalSearch.focus();

            setTimeout(function () {
                globalSearch.removeAttribute("readonly");
            }, 100);
        }

        if (event.metaKey && event.keyCode === 190) {
            let indexSearch = document.getElementById('search');

            indexSearch.setAttribute("readonly", "true");
            indexSearch.focus();

            setTimeout(function () {
                indexSearch.removeAttribute("readonly");
            }, 100);
        }
    });
}

function addHiddenAttributeToHiddenInputs() {
    let tokens = document.getElementsByName("_token");

    for (let i = 0; i < tokens.length; i++) {
        tokens[i].setAttribute('hidden', 'hidden');
    }

    let methods = document.getElementsByName("_method");

    for (let i = 0; i < methods.length; i++) {
        methods[i].setAttribute('hidden', 'hidden');
    }
}

function initTomSelect() {
    document.querySelectorAll('.tom-select').forEach((el) => {
        new TomSelect(el, {
            allowEmptyOption: true,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
    });
}

function initFilePond() {
    // Get a reference to the file input element
    const inputElement = document.getElementById('photo');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

    FilePond.setOptions({
        credits: false,
        server: {
            url: '/backend/temporary-files/store',
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            },
        },
    })
}
