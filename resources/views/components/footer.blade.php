<style class="text/css">
    .background {
        position: absolute;
        z-index: -1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    ul {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .socials {
        gap: 20px;
    }

    .socials a {
        font-size: 24px;
        color: white;
    }

    .links {
        gap: 10px;
        color: white;
    }

    .legal {
        font-size: 12px;
        margin: 0;
        color: white;
    }

    svg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transform: scaleY(3) scaleX(2.25);
        transform-origin: bottom;
        box-sizing: border-box;
        display: block;
        pointer-events: none;
    }

    footer {
        position: fixed;
        left: 0;
        bottom: 0;
        display: flex;
        width: 100%;
        height: 370px;
    }

    section {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        gap: 30px;
        padding-bottom: 80px;
        padding-left: 60px;
        width: 100%;
    }

    @media (width > 420px) {
        section {
            align-items: center;
            padding-left: 0;
            gap: 20px;
        }

        .links {
            gap: 20px;
        }
    }
</style>
<footer>
    <div class="background">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="100%" height="100%" viewBox="0 0 1600 900">
            <defs>
                <path id="wave" fill="rgba(105, 27, 252, 0.6)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
    s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
            </defs>
            <g>
                <use xlink:href="#wave" opacity=".4">
                    <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="8s"
                        calcMode="spline" values="270 230; -334 180; 270 230" keyTimes="0; .5; 1"
                        keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                </use>
                <use xlink:href="#wave" opacity=".6">
                    <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="6s"
                        calcMode="spline" values="-270 230;243 220;-270 230" keyTimes="0; .6; 1"
                        keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                </use>
                <use xlink:href="#wave" opacty=".9">
                    <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="4s"
                        calcMode="spline" values="0 230;-140 200;0 230" keyTimes="0; .4; 1"
                        keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                </use>
            </g>
        </svg>
    </div>
    <section>
        <ul class="socials">
            <li><a class="fa-brands fa-x-twitter"></a></li>
            <li><a class="fa-brands fa-facebook"></a></li>
            <li><a class="fa-brands fa-linkedin"></a></li>
        </ul>
        <ul class="links">
            <li><a href="/">Home</a></li>
            <li><a>Acerca de</a></li>
            <li><a>Servicios</a></li>
            <li><a>Portal empleos</a></li>
            <li><a>Contactanos</a></li>
        </ul>
        <p class="legal">
            <?php echo date('Y'); ?> © Todos los derechos reservados
        </p>
    </section>
</footer>