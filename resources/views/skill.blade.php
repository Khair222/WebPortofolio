<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills - Tech Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
            <a href="about.html" class="nav-logo">
                <img src="profil.jpg" alt="Logo">
                <span>Fathul Khair</span>
            </a>
            <ul class="nav-links">
                <li><a href="about.html"><i class="fas fa-user"></i> About</a></li>
                <li><a href="gallery.html"><i class="fas fa-images"></i> Gallery</a></li>
                <li><a href="skill.html"><i class="fas fa-brain"></i> Skills</a></li>
                <li><a href="project.html"><i class="fas fa-project-diagram"></i> Projects</a></li>
                <li><a href="achievements.html"><i class="fas fa-award"></i> Achievements</a></li>
                <li><a href="contact.html"><i class="fas fa-envelope"></i> Contact</a></li>
                <li><a href="chat.html"><i class="fas fa-comments"></i> Chat</a></li>
            </ul>
        </nav>
    </header>

    <main class="fade-in-up">
        <div class="container py-5">
            <section>
                <div class="text-center mb-5">
                    <h1 class="display-4 fw-bold">Keahlian & Kompetensi</h1>
                    <p class="text-secondary">Spektrum teknologi yang saya kuasai untuk membangun produk digital.</p>
                </div>

                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="glass-card h-100">
                            <h3 class="mb-4 fw-bold"><i class="fas fa-layer-group text-info me-2"></i>Keahlian & Kompetensi</h3>
                            @forelse($skills->where('category', 'progress') as $skill)
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="fw-medium">{{ $skill->name }}</span>
                                        <span class="text-info">{{ $skill->percentage }}%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{ $skill->percentage }}%"></div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-secondary small">Belum ada data keahlian.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="glass-card h-100">
                            <h3 class="mb-4 fw-bold text-center">Tech Stack & Tools</h3>
                            <div class="row g-4 text-center">
                                @forelse($skills->where('category', 'stack') as $skill)
                                    <div class="col-4 col-sm-3">
                                        <i class="{{ $skill->icon }} fs-1 mb-2"></i>
                                        <p class="small mb-0">{{ $skill->name }}</p>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-secondary small">Belum ada data tech stack.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>Fathul Khair</h4>
                <p>Mahasiswa Teknik Informatika USU & Full-Stack Developer yang berfokus pada solusi digital berdampak.
                </p>
                <div class="social-links">
                    <a href="https://www.instagram.com/edm.fhl.khair?igsh=MWphcG5teDdsb29sZQ==" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://github.com/Khair222" target="_blank"><i class="fab fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/fathul-khair-070091413" target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h4>Navigasi</h4>
                <ul class="footer-links">
                    <li><a href="about.html">Tentang</a></li>
                    <li><a href="project.html">Proyek</a></li>
                    <li><a href="skill.html">Keahlian</a></li>
                    <li><a href="contact.html">Kontak</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Kontak</h4>
                <p>Email: fathulkhair393@gmail.com</p>
                <p>Lokasi: Medan, Indonesia</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Fathul Khair. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>