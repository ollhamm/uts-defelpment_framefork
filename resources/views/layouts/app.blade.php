<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .fade-in {
            animation: fadeInAnimation ease 0.5s;
            animation-iteration-count: 1;
            opacity: 0;
            transform: translateX(-100%);
        }

        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
                transform: translateX(-100%);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .fade-in-left {
            animation: fadeInLeftAnimation ease 0.5s;
            animation-iteration-count: 1;
            opacity: 0;
            transform: translateX(-100%);
        }

        @keyframes fadeInLeftAnimation {
            0% {
                opacity: 0;
                transform: translateX(-100%);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .fade-in-right {
            animation: fadeInRightAnimation ease 0.5s;
            animation-iteration-count: 1;
            opacity: 0;
            transform: translateX(100%);
        }

        @keyframes fadeInRightAnimation {
            0% {
                opacity: 0;
                transform: translateX(100%);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }


        .navbar-content {
            animation: slideInFromTop ease 0.5s forwards;
            opacity: 0;
            transform: translateY(-100%);
        }

        @keyframes slideInFromTop {
            0% {
                opacity: 0;
                transform: translateY(-100%);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body style="background-color: #b2d8b2">

    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4 navbar-content">
        <a class="navbar-brand" href="/">
            <span style="font-weight: bold; color: #7fbf7f;"> <i class="fa-solid fa-notes-medical"></i> RSU Cinta
                Kasih</span>
        </a>
        @if (!Route::is('login') && !Route::is('register'))
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a style="font-weight: bold; color: #7fbf7f;" class="nav-link dropdown-toggle" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> {{ session('user_name') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <button class="btn btn-danger text-white">Logout</button>
                                </a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        @endif <!-- End of the conditional statement -->
    </nav>



    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <script src="https://kit.fontawesome.com/09b5482c09.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


{{-- print barcode --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('btn-print-barcode').addEventListener('click', function () {
            var kodeRM = document.getElementById('barcode').getAttribute('data-rm');
            generateBarcode(kodeRM);
        });

        function generateBarcode(text) {
            var printWidth = 300; // Ubah sesuai dengan ukuran lebar gambar barcode (dalam piksel)
            var printHeight = 200; // Ubah sesuai dengan ukuran tinggi gambar barcode (dalam piksel)
            var paperWidth = '4in'; // Ukuran lebar kertas stiker (misalnya 4 inci)
            var paperHeight = '6in'; // Ukuran tinggi kertas stiker (misalnya 6 inci)

            var barcodeImage = document.createElement('img');
            barcodeImage.src = 'https://barcode.tec-it.com/barcode.ashx?data=' + text + '&code=Code128&dpi=96';
            barcodeImage.style.width = printWidth + 'px'; // Atur lebar gambar barcode
            barcodeImage.style.height = 'auto'; // Biarkan tinggi menyesuaikan agar tidak terdistorsi
            barcodeImage.style.display = 'block'; // Agar gambar di tengah
            barcodeImage.style.margin = 'auto'; // Agar gambar di tengah

            var barcodeDiv = document.getElementById('barcode');
            barcodeDiv.innerHTML = '';
            barcodeDiv.appendChild(barcodeImage);

            // Apply CSS for printing
            var style = document.createElement('style');
            style.textContent = `
                @media print {
                    body * {
                        visibility: hidden;
                    }
                    #barcode, #barcode * {
                        visibility: visible;
                    }
                    #barcode {
                        position: absolute;
                        left: 50%;
                        top: 50%;
                        transform: translate(-50%, -50%);
                        width: ${printWidth}px;
                        height: ${printHeight}px;
                    }
                    @page {
                        size: ${paperWidth} ${paperHeight};
                        margin: 0;
                    }
                }
            `;
            document.head.appendChild(style);

            setTimeout(function () {
                window.print();
            }, 50);
        }
    });
</script>
{{-- end print barcode --}}

{{-- print detail --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('btn-print-detail').addEventListener('click', function () {
            window.print(); // Trigger printing of the entire page
        });
    });
</script>

{{-- Animasi --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const elementsFadeIn = document.querySelectorAll('.fade-in');
            elementsFadeIn.forEach(element => {
                element.classList.add('animate__animated', 'animate__fadeIn');
                element.addEventListener('animationend', () => {
                    element.classList.remove('animate__animated', 'animate__fadeIn');
                });
                element.style.opacity = 1;
                element.style.transform = 'translateX(0)';
            });

            const elementsFadeInLeft = document.querySelectorAll('.fade-in-left');
            elementsFadeInLeft.forEach(element => {
                element.classList.add('animate__animated', 'animate__fadeInLeft');
                element.addEventListener('animationend', () => {
                    element.classList.remove('animate__animated', 'animate__fadeInLeft');
                });
                element.style.opacity = 1;
                element.style.transform = 'translateX(0)';
            });

            const elementsFadeInRight = document.querySelectorAll('.fade-in-right');
            elementsFadeInRight.forEach(element => {
                element.classList.add('animate__animated', 'animate__fadeInRight');
                element.addEventListener('animationend', () => {
                    element.classList.remove('animate__animated', 'animate__fadeInRight');
                });
                element.style.opacity = 1;
                element.style.transform = 'translateX(0)';
            });

            const navbarContent = document.querySelector('.navbar-content');
            navbarContent.classList.add('animate__animated', 'animate__slideInFromTop');
            navbarContent.addEventListener('animationend', () => {
                navbarContent.classList.remove('animate__animated', 'animate__slideInFromTop');
            });
            navbarContent.style.opacity = 1;
            navbarContent.style.transform = 'translateY(0)';
        });
    </script>

</body>

</html>
