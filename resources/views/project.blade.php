<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - Tech Portfolio</title>
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
                    <h1 class="display-4 fw-bold">Proyek Terbaru</h1>
                    <p class="text-secondary">Eksplorasi solusi digital yang telah saya bangun.</p>
                </div>

                <div class="row g-4">
                    @forelse($projects as $project)
                    <div class="col-lg-6 col-12">
                        <div class="glass-card p-0 overflow-hidden h-100 d-flex flex-column">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid" alt="{{ $project->title }}" style="width: 100%; height: 250px; object-fit: cover; object-position: top;">
                            @else
                                <div style="height: 250px; background: rgba(0,0,0,0.2); display: flex; align-items: center; justify-content: center; border-bottom: 1px solid var(--grid-line);">
                                    <i class="fas fa-image fa-3x text-secondary" style="opacity: 0.3;"></i>
                                </div>
                            @endif
                            <div class="p-4 flex-grow-1">
                                <h2 class="h4 mb-3" style="color: var(--text-primary); font-weight: bold;">{{ $project->title }}</h2>
                                
                                @if($project->technologies)
                                    <div class="mb-3 d-flex flex-wrap gap-2">
                                        @foreach(explode(',', $project->technologies) as $tech)
                                            <span class="badge" style="background: transparent; border: 1px solid var(--accent-blue); color: var(--accent-blue); font-weight: 600; padding: 0.5em 0.8em; font-family: 'Space Mono', monospace;">{{ trim($tech) }}</span>
                                        @endforeach
                                    </div>
                                @endif

                                <p class="small opacity-75 mt-3" style="color: var(--text-primary); line-height: 1.6;">{{ $project->description }}</p>
                            </div>
                            <div class="p-4 border-top d-flex gap-3 align-items-center" style="border-color: var(--grid-line) !important;">
                                @if($project->github_link)
                                    <a href="{{ $project->github_link }}" target="_blank" class="btn-neon px-4 py-2" style="font-size: 0.9rem; padding: 0.5rem 1.5rem;">Github</a>
                                @endif
                                
                                @if($project->demo_link)
                                    <a href="{{ $project->demo_link }}" target="_blank" class="btn-outline-light px-4 py-2" style="font-size: 0.9rem; padding: 0.5rem 1.5rem; border-radius: 0;">Demo</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center text-secondary py-5">
                        <i class="fas fa-folder-open fa-3x mb-3" style="opacity: 0.5;"></i>
                        <p>Belum ada proyek yang ditambahkan.</p>
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