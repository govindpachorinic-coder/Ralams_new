<style>
    .footer-bs {
        background-color: #f8f9fa;
        font-size: 11px;
        line-height: 1.2;
        padding: 10px 0;
        border-top: 1px solid #ccc;
    }

    .footer-bs .footer-nav p {
        font-weight: 600;
        margin-bottom: 6px;
        font-size: 11px;
    }

    .footer-bs .list {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }

    .footer-bs .list li {
        margin: 2px 0;
        padding: 0;
    }

    .footer-bs .list li a {
        text-decoration: none;
        color: #333;
        font-size: 11px;
    }

    .footer-bs .list li a:hover {
        text-decoration: underline;
        color: #007bff;
    }

    .footer-bs img {
        max-height: 44px;
        margin: 2px 6px 2px 0;
    }

    .footer-bs .footer-social,
    .footer-bs .footer-ns {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        margin: 0;
    }

    .backtotop {
        font-size: 16px;
        width: 28px;
        height: 28px;
        background: #007bff;
        border-radius: 50%;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    .b-footer-credit {
        font-size: 10px;
        padding: 5px 0 0;
        margin-top: 10px;
        color: #333 !important;
    }

    .b-footer-credit a {
        font-weight: 600;
        color: #000;
        text-decoration: none;
    }

    .b-footer-credit a:hover {
        color: #007bff;
    }

    .logo-wrapper {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: #ffffff;
        padding: 4px 8px;
        border-radius: 4px;
    }


    @media (max-width: 768px) {
        .footer-bs {
            text-align: center;
        }

        .footer-bs .footer-nav .col-sm-6 {
            margin-bottom: 10px;
        }

        .footer-bs .footer-social,
        .footer-bs .footer-ns {
            justify-content: center;
        }
    }
</style>

<div class="footer-bs">
    <footer class="container">
        <div class="row align-items-center">
            <!-- Quick Links -->
            <div class="col-md-5 col-sm-12 footer-nav">
                <p>Quick Links</p>
                <div class="row">
                    <div class="col-sm-4">
                        <ul class="list">
                            <li><a href="inner.html">Policies</a></li>
                            <li><a href="contactus.html">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list">
                            <li data-toggle="modal" data-target="#feedback-modal"><a href="javascript:void(0)">Feedback</a></li>
                            <li><a href="inner.html">Help Centre</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-4">
                        <ul class="list">
                            <li><a href="inner.html">Guidelines</a></li>
                            <li><a href="javascript:void(0);">About Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Logos -->
            <div class="col-md-5 col-sm-8 footer-social">
                <div class="logo-wrapper bg-white p-1 rounded">
                    <img src="{{ asset('public_assets/images/NIC.png') }}" alt="NIC logo">
                    <img src="{{ asset('public_assets/images/digital-india.png') }}" alt="Digital India logo">
                </div>
            </div>


            <!-- Back to Top -->
            <div class="col-md-2 col-sm-4 footer-ns">
                <a class="backtotop" title="Back to top" href="#b-accessibility">
                    <i class="fas fa-angle-up"></i>
                </a>
            </div>
        </div>

        <!-- Credit -->
        <div class="text-center b-footer-credit">
            This website belongs to Department of
            <a href="#">{{ __('labels.department_of_revenue_rajasthan') }}</a>,
            <a href="https://rajasthan.gov.in/">{{ __('labels.government_of_rajasthan') }}</a>
        </div>
    </footer>
</div>
