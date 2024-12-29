
<script src="{{ asset('front/assets/jquery-nice-select-1.1.0/js/jquery.js') }}"></script>
    <script src="{{ asset('front/assets/jquery-nice-select-1.1.0/js/jquery.nice-select.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('select').niceSelect()
        })


        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.getElementById('success-alert');
            const errorAlert = document.getElementById('error-alert');

            function hideAlert(element) {
                if (element) {
                    setTimeout(() => {
                        element.classList.add('fade-out');
                        setTimeout(() => {
                            element.style.display = 'none';
                        }, 300);
                    }, 5000);
                }
            }

            hideAlert(successAlert);
            hideAlert(errorAlert);
        });
    </script>
    <script src="{{ asset('front/assets/swiper/swiper.js') }}"></script>
    <script src="{{ asset('front/assets/js/index.js') }}"></script>

    
@stack('js')
@stack('js')
