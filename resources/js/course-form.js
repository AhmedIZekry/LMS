// const csrf_token = $(`meta[name="csrf_token"]`).attr('content');
// const base_url = $(`meta[name="base_url"]`).attr('content');
// const basic_info_url = base_url + '/instructor/courses/save';
// const update_url = base_url + '/instructor/courses/update';
//
//
// $('.form-basic-info').on('submit', function (e) {
//     e.preventDefault();
//
//     let formData = new FormData(this);
//     $.ajax({
//         method: "POST",
//         url: basic_info_url,
//         data: formData,
//         contentType: false,
//         processData: false,
//         beforeSend: function () {
//
//         },
//         success: function (data) {
//             if (data.success) {
//
//                 window.location.href = data.redirect
//             }
//         },
//         error: function (xhr, status, error) {
//             console.log(xhr);
//             let errors = xhr.responseJSON.errors;
//             $.each(errors, function (key, value) {
//                 notyf.error(value[0]);
//             })
//
//         },
//         complete: function () { }
//     })
//
// });
//
// $('.form-more-info').on('submit', function (e) {
//     e.preventDefault();
//
//     let formData = new FormData(this);
//     $.ajax({
//         method: "POST",
//         url: update_url,
//         data: formData,
//         contentType: false,
//         processData: false,
//         beforeSend: function () {
//
//         },
//         success: function (data) {
//             if (data.success) {
//                 window.location.href = data.redirect
//             }
//         },
//         error: function (xhr, status, error) {
//             let errors = xhr.responseJSON.errors;
//             $.each(errors, function (key, value) {
//                 notyf.error(value[0]);
//             })
//         },
//         complete: function () { }
//     })
//
// });

import {Notyf} from "notyf";

const csrf_token = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
const base_url = document.querySelector('meta[name="base_url"]').getAttribute('content');
const basic_info_url = `${base_url}/instructor/courses/save`;
const update_url = `${base_url}/instructor/courses/update`;
const basicInfoForm = document.querySelector('.form-basic-info')

// Initialize Notyf
const notyf = new Notyf({
    duration: 3000, // Notification duration in milliseconds
    position: {
        x: 'right',
        y: 'top',
    },
    types: [
        {
            type: 'error',
            background: 'red',
            duration: 5000,
            dismissible: true,
        },
    ],
});
if(basicInfoForm){
    basicInfoForm.addEventListener('submit',async function (e)
    {
        e.preventDefault();
        const formData = new FormData(this);
        const actionUrl = this.getAttribute('action');
        const response = await fetch(actionUrl,{
            method:"POST",
            body:formData,

        })
        if (!response.ok) {
            // If the response is not okay, check for validation errors
            const errorData = await response.json();

            if (errorData.errors) {
                // Loop through the errors and display them
                for (const [field, messages] of Object.entries(errorData.errors)) {
                    console.error(`${field}: ${messages.join(', ')}`); // Log to console
                    notyf.error(`${field}: ${messages.join(', ')}`); // Show error in UI
                }
            } else {
                // Handle other types of errors
                console.error('An error occurred:', errorData.message);
                notyf.error(errorData.message);
            }
            return;
        }
        const data = await response.json();
        if (data.success){
            window.location.href = data.redirect
        }
    });
}
const moreInfoForm = document.querySelector('.form-more-info');
if(moreInfoForm){
    moreInfoForm.addEventListener('submit', async function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const actionUrl = this.getAttribute('action'); // Dynamically get the action attribute
        try {
            const response = await fetch(actionUrl, {
                method: "POST",
                body: formData,
                headers: {
                    'Accept': 'application/json', // Ensure Laravel returns JSON
                },
            });

            if (!response.ok) {
                // If the response is not okay, check for validation errors
                const errorData = await response.json();

                if (errorData.errors) {
                    // Loop through the errors and display them
                    for (const [field, messages] of Object.entries(errorData.errors)) {
                        console.error(`${field}: ${messages.join(', ')}`); // Log to console
                        notyf.error(`${field}: ${messages.join(', ')}`); // Show error in UI
                    }
                } else {
                    // Handle other types of errors
                    console.error('An error occurred:', errorData.message);
                    notyf.error(errorData.message);
                }
                return;
            }

            // If successful, process the success response
            const data = await response.json();
            if (data.success) {
                window.location.href = data.redirect; // Redirect to the next page
            }
        } catch (error) {
            console.error('An unexpected error occurred:', error); // Handle network or other errors
            notyf.error('Something went wrong. Please try again.');
        }
    });
}
document.querySelectorAll('.course-tab').forEach(tab => {
    tab.addEventListener('click', function (e) {
        e.preventDefault();
        const step = this.getAttribute('data-step');
        const courseForm = document.querySelector('.course-form');

        if (courseForm) {
            const nextStepInput = courseForm.querySelector('input[name="next_step"]');
            if (nextStepInput) {
                nextStepInput.value = step;
                courseForm.dispatchEvent(new Event('submit', { cancelable: true }));
            } else {
                const errorMessage = 'Error: Missing input[name="next_step"] in the form.';
                console.error(errorMessage);
                notyf.error('Validation Error: Next step input is missing.');
            }
        } else {
            const errorMessage = 'Error: Missing .course-form element.';
            console.error(errorMessage);
            notyf.error('Error: Course form element is not found.');

        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Attach an event listener to dynamically handle changes on elements with the 'storage' class
    document.addEventListener('change', function (e) {
        if (e.target.classList.contains('storage')) {
            const value = e.target.value;
            const sourceInputElements = document.querySelectorAll('.source_input');
            const uploadSourceElement = document.querySelector('.upload_source');
            const externalSourceElement = document.querySelector('.external_source');

            // Clear all input values in elements with the 'source_input' class
            sourceInputElements.forEach(input => input.value = '');

            console.log("working");

            // Show or hide elements based on the selected value
            if (value === 'upload') {
                uploadSourceElement.classList.remove('d-none');
                externalSourceElement.classList.add('d-none');
            } else {
                uploadSourceElement.classList.add('d-none');
                externalSourceElement.classList.remove('d-none');
            }
        }
    });
});

const dynamicModal = document.querySelectorAll('.dynamic-modal-btn');
if(dynamicModal){
    dynamicModal.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const modal = document.querySelector('#dynamic-modal');
            if (modal) {
                // Show the modal by adding the Bootstrap modal class
                new bootstrap.Modal(modal).show();
            } else {
                console.error('Error: Modal with ID #dynamic-modal not found.');
            }
        });
    });
}



















































































//
// const notyf = new Notyf({
//     duration: 5000,
//     dismissible: true
// });
//
// const loader = `
// <div class="modal-content text-center p-3" style="display:inline">
//     <div class="spinner-border" role="status">
//         <span class="visually-hidden">Loading...</span>
//     </div>
// </div>
// `;
//
// // Course tab navigation
// document.querySelectorAll('.course-tab').forEach(tab => {
//     tab.addEventListener('click', function (e) {
//         e.preventDefault();
//         const step = this.dataset.step;
//         document.querySelector('.course-form').querySelector('input[name="next_step"]').value = step;
//         document.querySelector('.course-form').submit();
//     });
// });
//
// function handleFormSubmit(form, url) {
//     form.addEventListener('submit', async (e) => {
//         e.preventDefault();
//
//         const formData = new FormData(form);
//         try {
//             const response = await fetch(url, {
//                 method: "POST",
//                 body: formData
//             });
//             const data = await response.json();
//             if (data.status === 'success') {
//                 window.location.href = data.redirect;
//             }
//         } catch (error) {
//             console.log(error);
//             const errors = error.responseJSON?.errors || {};
//             Object.values(errors).forEach(value => {
//                 notyf.error(value[0]);
//             });
//         }
//     });
// }
//
// handleFormSubmit(document.querySelector('.basic_info_form'), basic_info_url);
// handleFormSubmit(document.querySelector('.basic_info_update_form'), update_url);
// handleFormSubmit(document.querySelector('.more_info_form'), update_url);
//
// document.addEventListener('DOMContentLoaded', function () {
//     // Show/Hide path input depending on source
//     document.querySelectorAll('.storage').forEach(storage => {
//         storage.addEventListener('change', function () {
//             const value = this.value;
//             document.querySelector('.source_input').value = '';
//             if (value === 'upload') {
//                 document.querySelector('.upload_source').classList.remove('d-none');
//                 document.querySelector('.external_source').classList.add('d-none');
//             } else {
//                 document.querySelector('.upload_source').classList.add('d-none');
//                 document.querySelector('.external_source').classList.remove('d-none');
//             }
//         });
//     });
// });
//
// // Dynamic modal content for course, chapter, and lesson actions
// async function fetchAndDisplayModalContent(url) {
//     document.querySelector('.dynamic-modal-content').innerHTML = loader;
//     try {
//         const response = await fetch(url);
//         const data = await response.text();
//         document.querySelector('.dynamic-modal-content').innerHTML = data;
//     } catch (error) {
//         console.error(error);
//     }
// }
//
// document.querySelectorAll('.dynamic-modal-btn').forEach(button => {
//     button.addEventListener('click', function (e) {
//         e.preventDefault();
//         const course_id = this.dataset.id;
//         $('#dynamic-modal').modal("show");
//         fetchAndDisplayModalContent(`${base_url}/instructor/course-content/${course_id}/create-chapter`);
//     });
// });
//
// document.querySelectorAll('.edit_chapter').forEach(button => {
//     button.addEventListener('click', function (e) {
//         e.preventDefault();
//         const chapter_id = this.dataset.chapterId;
//         $('#dynamic-modal').modal("show");
//         fetchAndDisplayModalContent(`${base_url}/instructor/course-content/${chapter_id}/edit-chapter`);
//     });
// });
//
// document.querySelectorAll('.add_lesson').forEach(button => {
//     button.addEventListener('click', function () {
//         const courseId = this.dataset.courseId;
//         const chapterId = this.dataset.chapterId;
//         $('#dynamic-modal').modal("show");
//         fetchAndDisplayModalContent(`${base_url}/instructor/course-content/create-lesson?course_id=${courseId}&chapter_id=${chapterId}`);
//     });
// });
//
// document.querySelectorAll('.edit_lesson').forEach(button => {
//     button.addEventListener('click', function () {
//         const courseId = this.dataset.courseId;
//         const chapterId = this.dataset.chapterId;
//         const lessonId = this.dataset.lessonId;
//         $('#dynamic-modal').modal("show");
//         fetchAndDisplayModalContent(`${base_url}/instructor/course-content/edit-lesson?course_id=${courseId}&chapter_id=${chapterId}&lesson_id=${lessonId}`);
//     });
// });
//
// // Sort lessons in a chapter
// if (document.querySelectorAll('.sortable_list li').length) {
//     new Sortable(document.querySelector('.sortable_list'), {
//         items: "li",
//         containment: "parent",
//         cursor: "move",
//         handle: ".dragger",
//         update: async function (event) {
//             const orderIds = [...this.querySelectorAll('li')].map(item => item.dataset.lessonId);
//             const chapterId = event.item.dataset.chapterId;
//             try {
//                 const response = await fetch(`${base_url}/instructor/course-chapter/${chapterId}/sort-lesson`, {
//                     method: 'POST',
//                     headers: {
//                         'Content-Type': 'application/json'
//                     },
//                     body: JSON.stringify({
//                         _token: csrf_token,
//                         order_ids: orderIds
//                     })
//                 });
//                 const data = await response.json();
//                 notyf.success(data.message);
//             } catch (error) {
//                 notyf.error('Error sorting lessons');
//             }
//         }
//     });
// }
//
// // Sort chapters in a course
// document.querySelectorAll('.sort_chapter_btn').forEach(button => {
//     button.addEventListener('click', function () {
//         const courseId = this.dataset.id;
//         $('#dynamic-modal').modal("show");
//         fetchAndDisplayModalContent(`${base_url}/instructor/course-content/${courseId}/sort-chapter`);
//     });
// });
// const csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
// const base_url = document.querySelector('meta[name="base_url"]').getAttribute('content');
// const basic_info_url = base_url + '/instructor/courses/create';
// const update_url = base_url + '/instructor/courses/update';
//
// // Handle Basic Info Form
// document.querySelector('.form-basic-info').addEventListener('submit', async function (e) {
//     e.preventDefault();
//     const formData = new FormData(this);
//
//     try {
//         const response = await fetch(basic_info_url, {
//             method: "POST",
//             body: formData,
//             headers: {
//                 'X-CSRF-TOKEN': csrfToken
//             }
//         });
//         if (!response.ok) throw response;
//         const data = await response.json();
//         if (data.success) {
//             window.location.href = data.redirect;
//         }
//     } catch (error) {
//         const errors = await error.json();
//         if (errors.errors) {
//             Object.values(errors.errors).forEach(err => {
//                 console.error(err[0]); // Replace this with your notification logic
//             });
//         }
//     }
// });
//
// // Handle More Info Form
// document.querySelector('.form-more-info').addEventListener('submit', async function (e) {
//     e.preventDefault();
//     const formData = new FormData(this);
//
//     try {
//         const response = await fetch(update_url, {
//             method: "POST",
//             body: formData,
//             headers: {
//                 'X-CSRF-TOKEN': csrfToken,
//                 'Cache-Control': 'no-cache, no-store, must-revalidate',
//             }
//         });
//         if (!response.ok) throw response;
//         const data = await response.json();
//         if (data.success) {
//             window.location.href = data.redirect;
//         }
//     } catch (error) {
//         const errors = await error.json();
//         if (errors.errors) {
//             Object.values(errors.errors).forEach(err => {
//                 console.error(err[0]); // Replace this with your notification logic
//             });
//         }
//     }
// });
