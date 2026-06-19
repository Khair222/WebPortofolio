<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements - Tech Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    <h1 class="display-4 fw-bold">Pencapaian & Sertifikasi</h1>
                    <p class="text-secondary">Validasi kompetensi melalui pengakuan lembaga dan proyek nyata.</p>
                </div>

                <div class="row g-4">
                    @forelse($achievements as $achievement)
                    <div class="col-lg-6 col-12 text-center">
                        <div class="glass-card h-100 p-0 overflow-hidden d-flex flex-column">
                            @if($achievement->image)
                                <img src="{{ asset('storage/' . $achievement->image) }}" class="img-fluid" alt="{{ $achievement->title }}" style="width: 100%; height: 250px; object-fit: cover; object-position: center; border-bottom: 2px solid var(--accent-blue);">
                            @else
                                <div class="py-4 d-flex justify-content-center align-items-center" style="background: rgba(0,0,0,0.02); border-bottom: 1px solid var(--grid-line);">
                                    <div class="d-inline-flex justify-content-center align-items-center" style="width: 80px; height: 80px; border-radius: 0; background: var(--bg-paper); border: 2px solid var(--accent-blue);">
                                        <i class="fas fa-certificate fa-2x" style="color: var(--accent-red);"></i>
                                    </div>
                                </div>
                            @endif
                            <div class="p-4 flex-grow-1">
                                <h3 style="color: var(--accent-blue);">{{ $achievement->title }}</h3>
                                <p class="text-secondary small fw-bold mt-2" style="font-family: 'Space Mono', monospace;">{{ $achievement->issuer }} • {{ $achievement->date ?? '-' }}</p>
                                <p class="small opacity-75 mt-3" style="color: var(--text-primary);">{{ $achievement->description }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center text-secondary py-5">
                        <i class="fas fa-award fa-3x mb-3" style="opacity: 0.5;"></i>
                        <p>Belum ada sertifikat/pencapaian yang ditambahkan.</p>
                    </div>
                    @endforelse
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