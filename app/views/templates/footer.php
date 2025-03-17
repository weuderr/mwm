    <!-- Rodapé -->
    <footer class="bg-dark text-white mt-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-8">
                    <p>
                        &copy; <span id="ano"><?= date('Y') ?></span> MWM Softwares - Todos os direitos reservados.
                    </p>
                    <p>
                        <a href="mailto:mwmechnology@gmail.com" class="text-white">NIF 517158400</a>
                    </p>
                    <address>
                        <p>Rua Júlio Dinis, n.º 242, Bloco HBC, Sala 302 - 4050-318 Porto, Portugal</p>
                    </address>
                </div>
                <div class="col-md-4 text-md-right">
                    <a href="#" class="text-white mr-3" aria-label="Facebook"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-white mr-3" aria-label="LinkedIn"><i class="fab fa-linkedin fa-lg"></i></a>
                    <a href="#" class="text-white" aria-label="Instagram"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS (dependências Popper e jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Scripts personalizados -->
    <script src="<?= asset_url('js/main.js') ?>"></script>
</body>
</html> 