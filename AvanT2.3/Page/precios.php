<?php
include '../addP/header.php'
    ?>

<!-- Main content -->
<main class="content">
    <section class="hero">
        <h1 class="hero-title">Planes y Precios</h1>
        <p class="hero-subtitle">Elige el plan perfecto para tu equipo y tus necesidades</p>
    </section>

    <section class="pricing-section">
        <div class="pricing-grid">
            <div class="pricing-card">
                <h2 class="pricing-title">Básico</h2>
                <p class="pricing-price">$9.99<span>/mes</span></p>
                <ul class="pricing-features">
                    <li><i data-lucide="check"></i> Hasta 5 usuarios</li>
                    <li><i data-lucide="check"></i> 10 GB de almacenamiento</li>
                    <li><i data-lucide="check"></i> Soporte por email</li>
                    <li><i data-lucide="check"></i> Funciones básicas de gestión de tareas</li>
                </ul>
                <button class="btn btn-primary btn-full">Elegir Plan</button>
            </div>
            <div class="pricing-card featured">
                <div class="featured-badge">Más Popular</div>
                <h2 class="pricing-title">Pro</h2>
                <p class="pricing-price">$24.99<span>/mes</span></p>
                <ul class="pricing-features">
                    <li><i data-lucide="check"></i> Hasta 20 usuarios</li>
                    <li><i data-lucide="check"></i> 50 GB de almacenamiento</li>
                    <li><i data-lucide="check"></i> Soporte prioritario</li>
                    <li><i data-lucide="check"></i> Funciones avanzadas de colaboración</li>
                    <li><i data-lucide="check"></i> Informes y análisis</li>
                </ul>
                <button class="btn btn-primary btn-full">Elegir Plan</button>
            </div>
            <div class="pricing-card">
                <h2 class="pricing-title">Empresarial</h2>
                <p class="pricing-price">$49.99<span>/mes</span></p>
                <ul class="pricing-features">
                    <li><i data-lucide="check"></i> Usuarios ilimitados</li>
                    <li><i data-lucide="check"></i> 500 GB de almacenamiento</li>
                    <li><i data-lucide="check"></i> Soporte 24/7</li>
                    <li><i data-lucide="check"></i> Funciones personalizadas</li>
                    <li><i data-lucide="check"></i> API y integraciones avanzadas</li>
                    <li><i data-lucide="check"></i> Seguridad y cumplimiento empresarial</li>
                </ul>
                <button class="btn btn-primary btn-full">Contactar Ventas</button>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <h2 class="section-title">Preguntas Frecuentes</h2>
        <div class="faq-grid">
            <div class="faq-item">
                <h3 class="faq-question">¿Puedo cambiar de plan en cualquier momento?</h3>
                <p class="faq-answer">Sí, puedes actualizar o cambiar tu plan en cualquier momento. Los cambios
                    se aplicarán en tu próximo ciclo de facturación.</p>
            </div>
            <div class="faq-item">
                <h3 class="faq-question">¿Ofrecen una prueba gratuita?</h3>
                <p class="faq-answer">Sí, ofrecemos una prueba gratuita de 14 días para todos nuestros planes.
                    No se requiere tarjeta de crédito.</p>
            </div>
            <div class="faq-item">
                <h3 class="faq-question">¿Qué métodos de pago aceptan?</h3>
                <p class="faq-answer">Aceptamos todas las principales tarjetas de crédito, PayPal y
                    transferencias bancarias para planes empresariales.</p>
            </div>
            <div class="faq-item">
                <h3 class="faq-question">¿Puedo cancelar mi suscripción en cualquier momento?</h3>
                <p class="faq-answer">Sí, puedes cancelar tu suscripción en cualquier momento. No hay contratos
                    a largo plazo ni penalizaciones por cancelación.</p>
            </div>
        </div>
    </section>
</main>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-logo">
            <h2>Task Hub</h2>
            <p>Simplifica tu gestión de tareas</p>
        </div>
        <div class="footer-links">
            <div class="footer-column">
                <h3>Producto</h3>
                <ul>
                    <li><a href="#">Características</a></li>
                    <li><a href="#">Precios</a></li>
                    <li><a href="#">Integraciones</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Compañía</h3>
                <ul>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Clientes</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2023 Task Hub. Todos los derechos reservados.</p>
    </div>
</footer>
</div>
<script>
    lucide.createIcons();
</script>
</body>

</html>