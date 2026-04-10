<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Plataforma de Talentos</title>
    <!-- TailwindCSS CDN + Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        :root {
            --primary-dark: #6A2698;
            --primary-medium: #5A1D80;
            --primary-light: #E2D4F0;
            --accent-yellow: #FFC107;
            --accent-green: #6ECB63;
            --accent-red: #FF6B6B;
            --bg-light: #F8F9FA;
            --text-dark: #343A40;
            --text-gray: #6c757d;
            --white: #FFFFFF;
        }

        /* Animações profissionais */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .job-card {
            animation: slideIn 0.4s ease-out forwards;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .job-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(106, 38, 152, 0.12);
        }

        .bottom-nav-item {
            transition: all 0.2s ease;
            position: relative;
        }

        .bottom-nav-item.active {
            color: var(--primary-dark);
        }

        .bottom-nav-item.active::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            background-color: var(--primary-dark);
            border-radius: 2px;
        }

        .bottom-nav-item:hover {
            color: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-primary {
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(106, 38, 152, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .stat-card {
            transition: all 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.15);
        }

        .badge {
            transition: all 0.2s ease;
        }

        .glass-nav {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.98);
            border: 1px solid rgba(106, 38, 152, 0.08);
        }

        /* Scrollbar personalizada */
        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-track {
            background: var(--primary-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-dark);
            border-radius: 2px;
        }
    </style>
</head>

<body style="background: var(--bg-light); font-family: 'Inter', sans-serif;">

    <div class="max-w-md mx-auto relative" style="min-height: 100vh;">

        <!-- Header Profissional -->
        <div
            style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-medium) 100%); padding: 1.75rem 1.5rem 2rem 1.5rem;">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 style="font-size: 1.75rem; font-weight: 700; letter-spacing: -0.5px; color: var(--white);">
                        Work<span style="color: var(--accent-yellow);">Vale</span>
                    </h1>
                    <p style="font-size: 0.7rem; color: rgba(255,255,255,0.8); margin-top: 0.25rem;">Conectando
                        talentos, impulsionando negócios.</p>
                </div>
                <div class="flex items-center gap-2">
                    <div
                        style="background: rgba(255,255,255,0.1); border-radius: 0.5rem; padding: 0.5rem; cursor: pointer; transition: all 0.2s;">
                        <i class="far fa-bell" style="color: var(--white); font-size: 1.125rem;"></i>
                    </div>
                    <div
                        style="background: var(--accent-yellow); border-radius: 0.5rem; padding: 0.5rem; cursor: pointer; transition: all 0.2s;">
                        <i class="far fa-user-circle" style="color: var(--primary-dark); font-size: 1.125rem;"></i>
                    </div>
                </div>
            </div>

            <!-- Saudação Profissional -->
            <div class="mb-6">
                <h2 style="font-size: 1.25rem; font-weight: 600; color: var(--white); margin-bottom: 0.25rem;">Olá,
                    Maria</h2>
                <p style="font-size: 0.75rem; color: rgba(255,255,255,0.7);">3 novos desafios disponíveis para você</p>
            </div>

            <!-- Cards de Métricas -->
            <div class="grid grid-cols-3 gap-3">
                <div class="stat-card"
                    style="background: rgba(255,255,255,0.08); border-radius: 0.75rem; padding: 0.75rem; text-align: center;">
                    <i class="fas fa-folder-open" style="color: var(--accent-yellow); font-size: 1rem;"></i>
                    <p style="color: var(--white); font-size: 1.125rem; font-weight: 600; margin-top: 0.25rem;">12</p>
                    <p style="color: rgba(255,255,255,0.7); font-size: 0.65rem;">Projetos</p>
                </div>
                <div class="stat-card"
                    style="background: rgba(255,255,255,0.08); border-radius: 0.75rem; padding: 0.75rem; text-align: center;">
                    <i class="fas fa-award" style="color: var(--accent-yellow); font-size: 1rem;"></i>
                    <p style="color: var(--white); font-size: 1.125rem; font-weight: 600; margin-top: 0.25rem;">8</p>
                    <p style="color: rgba(255,255,255,0.7); font-size: 0.65rem;">Conquistas</p>
                </div>
                <div class="stat-card"
                    style="background: rgba(255,255,255,0.08); border-radius: 0.75rem; padding: 0.75rem; text-align: center;">
                    <i class="fas fa-chart-line" style="color: var(--accent-yellow); font-size: 1rem;"></i>
                    <p style="color: var(--white); font-size: 1.125rem; font-weight: 600; margin-top: 0.25rem;">R$ 4.8k
                    </p>
                    <p style="color: rgba(255,255,255,0.7); font-size: 0.65rem;">Ganhos</p>
                </div>
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div style="padding: 1.5rem;">

            <!-- Seção de Destaque -->
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 style="font-size: 1rem; font-weight: 600; color: var(--text-dark);">Desafios em Destaque</h3>
                    <p style="font-size: 0.7rem; color: var(--text-gray); margin-top: 0.25rem;">Oportunidades de alto
                        valor</p>
                </div>
                <span
                    style="background: var(--primary-light); color: var(--primary-dark); padding: 0.25rem 0.75rem; border-radius: 0.375rem; font-size: 0.7rem; font-weight: 500;">3
                    novos</span>
            </div>

            <div class="space-y-3">
                <!-- Card 1 -->
                <div class="job-card"
                    style="background: var(--white); border-radius: 1rem; padding: 1.125rem; box-shadow: 0 2px 8px rgba(0,0,0,0.04); border: 1px solid rgba(106, 38, 152, 0.08);">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                                <span
                                    style="background: var(--accent-red); color: white; font-size: 0.65rem; padding: 0.2rem 0.6rem; border-radius: 0.25rem; font-weight: 500;">Prioridade</span>
                                <span
                                    style="background: var(--accent-green); color: white; font-size: 0.65rem; padding: 0.2rem 0.6rem; border-radius: 0.25rem;">Remoto</span>
                            </div>
                            <h4 style="font-weight: 700; color: var(--text-dark); font-size: 1.125rem;">Desenvolvedor
                                Java</h4>
                            <p style="font-size: 0.75rem; color: var(--text-gray); margin-top: 0.25rem;">
                                <i class="fas fa-building" style="width: 1rem; margin-right: 0.25rem;"></i> Agência:
                                Consulta SP
                            </p>
                        </div>
                        <div style="background: var(--primary-light); padding: 0.25rem 0.6rem; border-radius: 0.5rem;">
                            <i class="fas fa-key" style="color: var(--accent-yellow); font-size: 0.7rem;"></i>
                            <i class="fas fa-key"
                                style="color: var(--accent-yellow); font-size: 0.7rem; margin-left: 0.125rem;"></i>
                            <span
                                style="color: var(--primary-dark); font-size: 0.7rem; font-weight: 500; margin-left: 0.25rem;">Cores</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 mb-3">
                        <div class="flex items-center gap-1">
                            <i class="fas fa-star" style="color: var(--accent-yellow); font-size: 0.7rem;"></i>
                            <i class="fas fa-star" style="color: var(--accent-yellow); font-size: 0.7rem;"></i>
                            <i class="fas fa-star" style="color: var(--accent-yellow); font-size: 0.7rem;"></i>
                            <i class="fas fa-star" style="color: var(--accent-yellow); font-size: 0.7rem;"></i>
                            <i class="fas fa-star-half-alt" style="color: var(--accent-yellow); font-size: 0.7rem;"></i>
                            <span style="font-size: 0.7rem; color: var(--text-gray); margin-left: 0.25rem;">(48)</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div>
                            <span style="color: var(--text-gray); font-size: 0.7rem;">Remuneração</span>
                            <p style="color: var(--primary-dark); font-weight: 700; font-size: 1.25rem;">R$ 1.200</p>
                        </div>
                        <a href="#" class="btn-primary"
                            style="background: var(--primary-dark); color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
                            Ver detalhes <i class="fas fa-arrow-right" style="font-size: 0.7rem;"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="job-card"
                    style="background: var(--white); border-radius: 1rem; padding: 1.125rem; box-shadow: 0 2px 8px rgba(0,0,0,0.04); border: 1px solid rgba(106, 38, 152, 0.08);">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                                <span
                                    style="background: var(--accent-green); color: white; font-size: 0.65rem; padding: 0.2rem 0.6rem; border-radius: 0.25rem;">Alta
                                    Demanda</span>
                            </div>
                            <h4 style="font-weight: 700; color: var(--text-dark); font-size: 1.125rem;">Desenvolvedor
                                Java</h4>
                            <p style="font-size: 0.75rem; color: var(--text-gray); margin-top: 0.25rem;">
                                <i class="fas fa-building"></i> Agência: Consulta SP
                            </p>
                        </div>
                        <div style="background: var(--primary-light); padding: 0.25rem 0.6rem; border-radius: 0.5rem;">
                            <i class="fas fa-key" style="color: var(--accent-yellow);"></i>
                            <i class="fas fa-key" style="color: var(--accent-yellow);"></i>
                            <span style="color: var(--primary-dark); font-size: 0.7rem; font-weight: 500;">Cores</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div>
                            <span style="color: var(--text-gray); font-size: 0.7rem;">Remuneração</span>
                            <p style="color: var(--primary-dark); font-weight: 700; font-size: 1.25rem;">R$ 1.200</p>
                        </div>
                        <a href="#" class="btn-primary"
                            style="background: var(--primary-dark); color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
                            Ver detalhes <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 3 com destaque especial -->
                <div class="job-card"
                    style="background: linear-gradient(135deg, var(--white), #fef9f0); border-radius: 1rem; padding: 1.125rem; box-shadow: 0 2px 8px rgba(0,0,0,0.04); border: 1px solid var(--accent-yellow);">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                                <span
                                    style="background: var(--accent-yellow); color: var(--text-dark); font-size: 0.65rem; padding: 0.2rem 0.6rem; border-radius: 0.25rem; font-weight: 600;">Destaque</span>
                            </div>
                            <h4 style="font-weight: 700; color: var(--text-dark); font-size: 1.125rem;">Desenvolvedor
                                Java Sênior</h4>
                            <p style="font-size: 0.75rem; color: var(--text-gray); margin-top: 0.25rem;">
                                <i class="fas fa-building"></i> Agência: Consulta SP
                            </p>
                        </div>
                        <div style="background: var(--primary-light); padding: 0.25rem 0.6rem; border-radius: 0.5rem;">
                            <i class="fas fa-diamond" style="color: var(--accent-yellow);"></i>
                            <span
                                style="color: var(--primary-dark); font-size: 0.7rem; font-weight: 500;">Premium</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div>
                            <span style="color: var(--text-gray); font-size: 0.7rem;">Remuneração</span>
                            <p style="color: var(--primary-dark); font-weight: 700; font-size: 1.25rem;">R$ 2.500</p>
                        </div>
                        <a href="#" class="btn-primary"
                            style="background: var(--primary-dark); color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
                            Ver detalhes <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Seção de Recomendações -->
            <div class="mt-8">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 style="font-size: 1rem; font-weight: 600; color: var(--text-dark);">Recomendados para você
                        </h3>
                        <p style="font-size: 0.7rem; color: var(--text-gray);">Baseado no seu perfil</p>
                    </div>
                    <a href="#"
                        style="color: var(--primary-dark); font-size: 0.75rem; font-weight: 500; text-decoration: none;">Ver
                        todos →</a>
                </div>

                <div class="job-card"
                    style="background: var(--white); border-radius: 1rem; padding: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; align-items: center; gap: 1rem;">
                    <div
                        style="background: linear-gradient(135deg, var(--primary-light), var(--primary-dark)); width: 48px; height: 48px; border-radius: 0.75rem; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-code" style="color: white; font-size: 1.25rem;"></i>
                    </div>
                    <div style="flex: 1;">
                        <h4 style="font-weight: 600; color: var(--text-dark); font-size: 0.875rem;">Arquiteto de
                            Software</h4>
                        <p style="font-size: 0.7rem; color: var(--text-gray);">TechLead Corp • Remoto</p>
                        <p
                            style="color: var(--primary-dark); font-weight: 600; font-size: 0.875rem; margin-top: 0.25rem;">
                            R$ 3.800</p>
                    </div>
                    <i class="fas fa-chevron-right" style="color: var(--primary-dark); font-size: 0.875rem;"></i>
                </div>

                <div class="job-card"
                    style="background: var(--white); border-radius: 1rem; padding: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; align-items: center; gap: 1rem; margin-top: 0.75rem;">
                    <div
                        style="background: linear-gradient(135deg, var(--primary-light), var(--primary-dark)); width: 48px; height: 48px; border-radius: 0.75rem; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-mobile-alt" style="color: white; font-size: 1.25rem;"></i>
                    </div>
                    <div style="flex: 1;">
                        <h4 style="font-weight: 600; color: var(--text-dark); font-size: 0.875rem;">Desenvolvedor
                            Mobile</h4>
                        <p style="font-size: 0.7rem; color: var(--text-gray);">AppSolutions • Híbrido</p>
                        <p
                            style="color: var(--primary-dark); font-weight: 600; font-size: 0.875rem; margin-top: 0.25rem;">
                            R$ 2.900</p>
                    </div>
                    <i class="fas fa-chevron-right" style="color: var(--primary-dark); font-size: 0.875rem;"></i>
                </div>
            </div>
        </div>

        <!-- Bottom Navigation Profissional -->
        <div class="glass-nav"
            style="position: fixed; bottom: 1rem; left: 1rem; right: 1rem; max-width: 24rem; margin: 0 auto; border-radius: 1rem; box-shadow: 0 4px 16px rgba(0,0,0,0.08); padding: 0.5rem 1rem; display: flex; justify-content: space-around; align-items: center;">
            <a href="#" class="bottom-nav-item active"
                style="display: flex; flex-direction: column; align-items: center; text-decoration: none; color: var(--primary-dark);">
                <i class="fas fa-home" style="font-size: 1.125rem;"></i>
                <span style="font-size: 0.65rem; margin-top: 0.25rem; font-weight: 500;">Início</span>
            </a>
            <a href="#" class="bottom-nav-item"
                style="display: flex; flex-direction: column; align-items: center; text-decoration: none; color: var(--text-gray);">
                <i class="fas fa-chart-bar" style="font-size: 1.125rem;"></i>
                <span style="font-size: 0.65rem; margin-top: 0.25rem;">Mural</span>
            </a>
            <a href="#" class="bottom-nav-item"
                style="display: flex; flex-direction: column; align-items: center; text-decoration: none; color: var(--text-gray);">
                <i class="fas fa-briefcase" style="font-size: 1.125rem;"></i>
                <span style="font-size: 0.65rem; margin-top: 0.25rem;">Meus Jobs</span>
            </a>
            <a href="#" class="bottom-nav-item"
                style="display: flex; flex-direction: column; align-items: center; text-decoration: none; color: var(--text-gray);">
                <i class="fas fa-wallet" style="font-size: 1.125rem;"></i>
                <span style="font-size: 0.65rem; margin-top: 0.25rem;">Carteira</span>
            </a>
        </div>

        <div style="height: 5rem;"></div>
    </div>

    <script>
        // Interatividade profissional
        document.querySelectorAll('a[href="#"]').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                console.log('Navegação profissional');
            });
        });

        // Navegação ativa
        const navItems = document.querySelectorAll('.bottom-nav-item');
        navItems.forEach(item => {
            item.addEventListener('click', function(e) {
                navItems.forEach(nav => {
                    nav.classList.remove('active');
                    nav.style.color = 'var(--text-gray)';
                });
                this.classList.add('active');
                this.style.color = 'var(--primary-dark)';
            });
        });

        // Efeito hover nos cards
        const cards = document.querySelectorAll('.job-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>

</html>
