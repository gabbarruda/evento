console.log("Esta funcionando");



// SW ACESSIBILIDADE
if (typeof sw_acessibilidade !== "function") {
    function sw_acessibilidade(param, callback) {

        // ANALISANDO PARÂMETROS
        if (typeof param === "undefined" || !param) { param = {} }
        if (typeof param.media === "undefined") { param.media = "desktop" }

        // ANALISANDO MEDIA
        if (
            (param.media === "todas" || param.media === "all") ||
            (param.media === "desktop" && window.innerWidth > 1000) ||
            (param.media === "mobile" && window.innerWidth <= 1000) ||
            (window.innerWidth <= param.media)
        ) {

            // ANALISANDO PARÂMETROS
            if (typeof param.layout === "undefined") { param.layout = "a1" }
            if (typeof param.caminho === "undefined") { param.caminho = "body" }

            // FUNÇÕES
            if (param.fonte !== false) { param.fonte = true; }
            if (param.contraste !== false) { param.contraste = true; }
            if (param.mapa !== false) { param.mapa = true; }
            if (param.vlibras !== false) { param.vlibras = true; }
            if (param.pagina !== false) { param.pagina = true; }
            if (param.transicoes !== false) { param.transicoes = true; }
            if (param.reset !== false) { param.reset = true; }
            if (param.irconteudo !== false) { param.irconteudo = true; }
            if (param.irmenu !== false) { param.irmenu = true; }
            if (param.irbusca !== false) { param.irbusca = true; }
            if (param.irrodape !== false) { param.irrodape = true; }


            // CRIANDO ELEMENTOS
            var sw_acessibilidade = $("#sw_acessibilidade");
            if (!sw_acessibilidade.length) {
                sw_acessibilidade = $('<div id="sw_acessibilidade" />');
                $(param.caminho).prepend(sw_acessibilidade);
            }
            sw_acessibilidade.addClass("sw_area_acessibilidade " + param.layout);


            // BOTÃO MENU ACESSIBILIDADE
            if (!sw_acessibilidade.find("#sw_btn_menu_acessibilidade").length) {
                var btn_menu_acessibilidade = $('<div id="sw_btn_menu_acessibilidade" class="sw_btn_menu_acessibilidade" />')

                // INSERINDO ÍCONE DE ACESSIBILIDADE E FECHAR
                btn_menu_acessibilidade.append('<div class="sw_icone_acessibilidade" />')
                    .append('<div class="sw_icone_fechar" />');

                // INSERINDO BOTÃO MENU
                sw_acessibilidade.append(btn_menu_acessibilidade);
            }
            // CLICK DO BOTÃO
            sw_acessibilidade.find("#sw_btn_menu_acessibilidade").on({
                "click": function() {
                    sw_acessibilidade.toggleClass("show");
                }
            });
            sw_acessibilidade.on({
                "mouseenter": function() {
                    if (window.innerWidth >= 1000) {
                        sw_acessibilidade.addClass("show");
                    }
                },
                "mouseleave": function() {
                    if (window.innerWidth >= 1000) {
                        sw_acessibilidade.removeClass("show");
                    }
                }
            });


            // CONT ACESSIBILIDADE
            if (!sw_acessibilidade.find(".sw_cont_acessibilidade").length) {
                sw_acessibilidade.append('<div class="sw_cont_acessibilidade" />');
            }

            // TÍTULO ACESSIBILIDADE
            if (!sw_acessibilidade.find(".sw_titulo_acessibilidade").length) {
                sw_acessibilidade.find(".sw_cont_acessibilidade").append('<div class="sw_titulo_acessibilidade"><span>Acessibilidade</span></div>');
            }

            // ÁREA BOTÕES
            if (!sw_acessibilidade.find(".sw_area_botoes_acessibilidade").length) {
                sw_acessibilidade.find(".sw_cont_acessibilidade").append('<div class="sw_area_botoes_acessibilidade" />');
            }

            // FUNÇÃO INSERE BOTÃO DE ACESSIBILIDADE
            function sw_insere_btn_acessibilidade(param_btn) {
                if (param_btn.seletor) {

                    // ANALISANDO SE O ELEMENTO NÃO EXISTE PARA ENTÃO CRIAR
                    if (!sw_acessibilidade.find(param_btn.seletor).length) {
                        var item = $(
                            '<a>' +
                            '<div></div>' +
                            '</a>'
                        ).attr(
                            param_btn.seletor.charAt(0) === '#' ? 'id' : 'class',
                            param_btn.seletor.substring(1)
                        );

                        // CLASSES
                        if (param_btn.classes) {
                            item.find("div").addClass(param_btn.classes);
                        }

                        // DESCRIÇÃO
                        if (param_btn.descricao) {
                            item.find(".sw_btn_acessibilidade").append('<span class="sw_txt_btn_acessibilidade">' + param_btn.descricao + '</span>');
                            item.attr("title", param_btn.descricao);
                        }

                        // ÍCONE
                        if (param_btn.icone) {
                            item.find(".sw_btn_acessibilidade").append('<span class="sw_icone_btn tamanho_fixo swfa ' + param_btn.icone + '" />')
                        }

                        // LINK
                        if (param_btn.link) {
                            item.attr("href", param_btn.link);
                        }

                        // ACCESSKEY
                        if (param_btn.accesskey) {
                            item.attr("accesskey", param_btn.accesskey);

                            // INSERINDO TECLADO NUMÉRICO
                            window.addEventListener("keydown", function(e) {
                                var keyCode = e.keyCode || e.which;
                                if (e.altKey && keyCode === param_btn.accesskey + 96) {
                                    if (param_btn.link) {
                                        window.location.href = param_btn.link;
                                    } else {
                                        item.trigger("click")
                                    }
                                }
                            }, false)
                        }

                        // INSERINDO ITEM
                        sw_acessibilidade.find(".sw_area_botoes_acessibilidade").append(item);
                    }
                }
            }


            // =============================================================
            //      BOTÃO AUMENTAR
            // =============================================================
            if (param.fonte && !sw_acessibilidade.find("#sw_btn_aumentar_acessibilidade").length) {
                sw_insere_btn_acessibilidade({
                    seletor: "#sw_btn_aumentar_acessibilidade",
                    classes: "sw_btn_acessibilidade sw_btn_aumentar_acessibilidade",
                    icone: "fas fa-plus",
                    descricao: "Aumentar fonte"
                });
            }
            // ATRIBUINDO FUNÇÃO
            sw_acessibilidade.find("#sw_btn_aumentar_acessibilidade").click(function() {
                // CARREGANDO FS
                sw_carregando_fs("show");

                // ALTERANDO FONTS
                sw_altera_fonts(1);

                // REMOVE CARREGANDO FS
                setTimeout(function() {
                    sw_carregando_fs("hide");
                }, 400);
            });

            // =============================================================
            //      BOTÃO DIMINUIR
            // =============================================================
            if (param.fonte && !sw_acessibilidade.find("#sw_btn_diminuir_acessibilidade").length) {
                sw_insere_btn_acessibilidade({
                    seletor: "#sw_btn_diminuir_acessibilidade",
                    classes: "sw_btn_acessibilidade sw_btn_diminuir_acessibilidade",
                    icone: "fas fa-minus",
                    descricao: "Diminuir fonte"
                });
            }
            // ATRIBUINDO FUNÇÃO
            sw_acessibilidade.find("#sw_btn_diminuir_acessibilidade").click(function() {
                // CARREGANDO FS
                sw_carregando_fs("show");

                // ALTERANDO FONTS
                sw_altera_fonts(-1);

                // REMOVE CARREGANDO FS
                setTimeout(function() {
                    sw_carregando_fs("hide");
                }, 400);
            });

            // =============================================================
            //      BOTÃO CONTRASTE
            // =============================================================
            if (param.contraste && !sw_acessibilidade.find("#sw_btn_contraste_acessibilidade").length) {
                sw_insere_btn_acessibilidade({
                    seletor: "#sw_btn_contraste_acessibilidade",
                    classes: "sw_btn_acessibilidade sw_btn_contraste_acessibilidade",
                    icone: "fas fa-adjust",
                    descricao: "Alto contraste",
                    accesskey: 5
                });
            }
            // ATRIBUINDO FUNÇÃO
            sw_acessibilidade.find("#sw_btn_contraste_acessibilidade").click(function() {
                var action_contraste = (localStorage.getItem("sw_acessibilidade_contraste") === "true") ? false : true;
                sw_contraste(action_contraste);
            });

            // =============================================================
            //      BOTÃO VLIBRAS
            // =============================================================
            if (param.vlibras && !sw_acessibilidade.find("#sw_btn_vlibras_acessibilidade").length && $("#vlibras_include img").length) {
                sw_insere_btn_acessibilidade({
                    seletor: "#sw_btn_vlibras_acessibilidade",
                    classes: "sw_btn_acessibilidade sw_btn_vlibras_acessibilidade",
                    icone: "fas fa-sign-language",
                    descricao: "Habilitar VLibras",
                    accesskey: 7
                });
            }
            // ATRIBUINDO FUNÇÃO
            sw_acessibilidade.find("#sw_btn_vlibras_acessibilidade").click(function() {
                var action_vlibras = (localStorage.getItem("sw_acessibilidade_vlibras") === "true") ? false : true;
                sw_vlibras(action_vlibras);
            });
            var vlibras_include = $("#vlibras_include");
            if (vlibras_include.length) {
                // BOTÃO ABRIR VLIBRAS
                vlibras_include.on("click", "div[vw-access-button]", function(e) {
                    setTimeout(function() {
                        sw_vlibras(true);
                    }, 100);
                });
                // BOTÃO FECHAR VLIBRAS
                vlibras_include.on("click", "img.vpw-settings-btn-close", function() {
                    setTimeout(function() {
                        sw_vlibras(false);
                    }, 100);
                });
            }

            // =============================================================
            //      BOTÃO TRANSIÇÕES
            // =============================================================
            if (param.transicoes && !sw_acessibilidade.find("#sw_btn_transicoes_acessibilidade").length) {
                sw_insere_btn_acessibilidade({
                    seletor: "#sw_btn_transicoes_acessibilidade",
                    classes: "sw_btn_acessibilidade sw_btn_transicoes_acessibilidade",
                    icone: "fab fa-delicious",
                    descricao: "Ativar/Desativar transições"
                });
            }
            // ATRIBUINDO FUNÇÃO
            sw_acessibilidade.find("#sw_btn_transicoes_acessibilidade").click(function() {
                // CARREGANDO FS
                sw_carregando_fs("show");

                // ACIONANDO FUNÇÃO
                var action_transicoes = (localStorage.getItem("sw_acessibilidade_transicoes") === "true") ? false : true;
                sw_desativa_transicoes(action_transicoes);

                // REMOVE CARREGANDO FS
                setTimeout(function() {
                    sw_carregando_fs("hide");
                }, 400);
            });

            // =============================================================
            //      BOTÃO MAPA
            // =============================================================
            if (param.mapa && !sw_acessibilidade.find("#sw_btn_mapa_acessibilidade").length) {
                sw_insere_btn_acessibilidade({
                    seletor: "#sw_btn_mapa_acessibilidade",
                    classes: "sw_btn_acessibilidade sw_btn_mapa_acessibilidade",
                    icone: "fas fa-sitemap",
                    descricao: "Mapa do site",
                    link: "/portal/mapa"
                });
            }

            // =============================================================
            //      BOTÃO ACESSIBILIDADE PÁGINA
            // =============================================================
            if (param.pagina && !sw_acessibilidade.find("#sw_btn_pagina_acessibilidade").length) {
                sw_insere_btn_acessibilidade({
                    seletor: "#sw_btn_pagina_acessibilidade",
                    classes: "sw_btn_acessibilidade sw_btn_pagina_acessibilidade",
                    icone: "fas fa-wheelchair",
                    descricao: "Página de Acessibilidade",
                    link: "/portal/acessibilidade",
                    accesskey: 6
                });
            }

            // =============================================================
            //      BOTÃO RESET
            // =============================================================
            if (param.reset && !sw_acessibilidade.find("#sw_btn_reset_acessibilidade").length) {
                sw_insere_btn_acessibilidade({
                    seletor: "#sw_btn_reset_acessibilidade",
                    classes: "sw_btn_acessibilidade sw_btn_reset_acessibilidade",
                    icone: "fas fa-undo",
                    descricao: "Resetar acessibilidade"
                });
            }
            // ATRIBUINDO FUNÇÃO
            sw_acessibilidade.find("#sw_btn_reset_acessibilidade").click(function() {
                // CARREGANDO FS
                sw_carregando_fs("show");

                // RESETANDO ACESSIBILIDADE
                var reset = true;
                set_acessibilidade(reset);

                // REMOVE CARREGANDO
                setTimeout(function() {
                    sw_carregando_fs("hide");
                }, 400);
            }).hide();


            // =============================================================
            //      BOTÃO IR PARA O CONTEÚDO
            // =============================================================
            if (param.irconteudo && !sw_acessibilidade.find("#sw_btn_irconteudo_acessibilidade").length) {
                sw_insere_btn_acessibilidade({
                    seletor: "#sw_btn_irconteudo_acessibilidade",
                    classes: "sw_btn_acessibilidade sw_link_acessibilidade sw_btn_irconteudo_acessibilidade",
                    icone: "fas fa-desktop",
                    descricao: "Ir para o conteúdo",
                    link: (location.pathname === "/" || location.pathname === "/portal" || location.pathname === "/portal/") ? "#e_conteudo" : "#e_centralizar",
                    accesskey: 1
                });
            }

            // =============================================================
            //      BOTÃO IR PARA O MENU
            // =============================================================
            if (param.irmenu && !sw_acessibilidade.find("#sw_btn_irmenu_acessibilidade").length) {
                sw_insere_btn_acessibilidade({
                    seletor: "#sw_btn_irmenu_acessibilidade",
                    classes: "sw_btn_acessibilidade sw_link_acessibilidade sw_btn_irmenu_acessibilidade",
                    icone: "fas fa-bars",
                    descricao: "Ir para o menu",
                    link: "#e_cont_topo",
                    accesskey: 2
                });
            }

            // =============================================================
            //      BOTÃO IR PARA A BUSCA
            // =============================================================
            if (param.irbusca && !sw_acessibilidade.find("#sw_btn_irbusca_acessibilidade").length) {
                sw_insere_btn_acessibilidade({
                    seletor: "#sw_btn_irbusca_acessibilidade",
                    classes: "sw_btn_acessibilidade sw_link_acessibilidade sw_btn_irbusca_acessibilidade",
                    icone: "fas fa-search",
                    descricao: "Ir para a busca",
                    link: "#e_campo_busca",
                    accesskey: 3
                });
            }
            // IR PARA BUSCA
            $("#irbusca").click(function() {
                $("#e_campo_busca").focus();
            });
            // FORMULÁRIO
            $("#formulario_busca").bind('submit', function() {
                var busca = ($("#e_campo_busca").val() == "") ? 0 : $("#e_campo_busca").val();
                window.location.href = '/portal/busca/' + busca;
                return false;
            });

            // =============================================================
            //      BOTÃO IR PARA O RODAPÉ
            // =============================================================
            if (param.irrodape && !sw_acessibilidade.find("#sw_btn_irrodape_acessibilidade").length) {
                sw_insere_btn_acessibilidade({
                    seletor: "#sw_btn_irrodape_acessibilidade",
                    classes: "sw_btn_acessibilidade sw_link_acessibilidade sw_btn_irrodape_acessibilidade",
                    icone: "fas fa-arrow-down",
                    descricao: "Ir para o rodapé",
                    link: "#e_cont_rodape",
                    accesskey: 4
                });
            }
        }
    }
}