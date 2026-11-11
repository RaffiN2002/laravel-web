import {
    Bold,
    ClassicEditor,
    Essentials,
    Heading,
    Italic,
    Link,
    List,
    Paragraph,
    Underline,
} from 'ckeditor5';
import 'ckeditor5/ckeditor5.css';

const textarea = document.querySelector('#workflow-editor');

if (textarea) {
    ClassicEditor
        .create(textarea, {
            plugins: [
                Essentials,
                Paragraph,
                Heading,
                Bold,
                Italic,
                Underline,
                Link,
                List,
            ],
            toolbar: [
                'undo',
                'redo',
                '|',
                'heading',
                '|',
                'bold',
                'italic',
                'underline',
                '|',
                'bulletedList',
                'numberedList',
                '|',
                'link',
            ],
        })
        .then((editor) => {
            const form = textarea.closest('form');

            if (form) {
                form.addEventListener('submit', () => {
                    textarea.value = editor.getData();
                });
            }
        })
        .catch((error) => {
            console.error('Could not initialize the Skill editor.', error);
        });
}
