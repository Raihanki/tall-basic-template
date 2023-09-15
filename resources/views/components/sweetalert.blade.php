<div x-data x-on:show-alert.window="Swal.fire({ icon: $event.detail[0].type, title: $event.detail[0].title, text: $event.detail[0].description })"></div>
