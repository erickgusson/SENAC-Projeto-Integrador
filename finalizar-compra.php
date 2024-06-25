<?php 
    include "./includes/header.php"
?>

<body>

    <main class="home">


        <section id="finalizar-compra">

            <h1>Finalizar Compra</h1>
            
            <form action="#" class="formulario-pedido">

                <div class="pedido-dados">
                    <div>

                        <label for="frete">Calcular frete:</label>
                        <p class="botao-geral"><img src="assets/img/icon/icon-mapa.png" alt=""><input type="search"
                                placeholder="0000-000"></p>

                    </div>

                    <div>

                        <label for="frete">Número da Casa:</label>
                        <p class="botao-geral"><img src="assets/img/icon/icon-mapa.png" alt=""><input type="search"
                                placeholder="0000"></p>

                    </div>

                    <div>

                        <label for="frete">Complemento:</label>
                        <p class="botao-geral"><img src="assets/img/icon/icon-mapa.png" alt=""><input type="search"
                                placeholder="0000"></p>

                    </div>

                    <div>

                        <label for="frete">Cadastar cupom: </label>
                        <p class="botao-geral"><img src="assets/img/icon/icon-cupom.png" alt=""><input type="search"
                                placeholder="INAUG30"></p>

                    </div>
                </div>

                <div class="pedido-info caixa">

                    <h3>Resumo do pedido</h3>

                    <ul>

                        <li>Subtotoal: <span>R$ 80,00</span></li>
                        <li>Frete: <span>R$ 10,00</span></li>
                        <li>desconto: <span>R$ 20,00</span></li>
                        <li>total: <span>R$ 80,00</span></li>

                    </ul>


                </div>
                <!-- <div class="pedido-pagamento">

                    <h3>Método de pagamnento</h3>

                    <div>
                        <input type="radio" name="metodo-pix" id="metodo-pix">
                        <label for="metodo-pix">
                            <img
                                src="assets/img/icon/icon-pix.png" alt="usar o pix">
                                <img src="assets/img/placeholder-qr.png"
                                alt="qr pix">
                            </label>
                    </div>
                    <input type="radio" name="metodo-pix" id="metodo-pix">


                </div> -->

            </form>

        </section>

        <footer class="footer">

            <div class="col">

                <a href="#">

                    <img src="assets/img/logo/Logo.png" alt="Logo">

                </a>

            </div>

            <div class="col">

                <h4>Local</h4>
                <p>Rua dos Doceiros <br> 14512-957</p>

            </div>

            <div class="col">

                <h4>Contato</h4>
                <p>(19)3636-3636 <br> (19)99999-9999</p>

            </div>

            <div class="col">

                <h4>Redes sociais</h4>
                <div class="footer-sociais">

                    <a href="#"><img src="assets/img/icon/Whats.png" alt="Contato atraves do WhatsApp"></a>
                    <a href="#"><img src="assets/img/icon/Facebook.png" alt="Contato atraves do Facebook"></a>
                    <a href="#"><img src="assets/img/icon/Insta.png" alt="Contato atraves do Inta"></a>

                </div>

            </div>

            <div class="col">

                <a href="sobre.html">
                    <h4>Quem somos</h4>
                </a>

            </div>

        </footer>

    </main>

</body>

</html>