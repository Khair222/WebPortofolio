<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Tech Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        .form-control:focus, .form-select:focus {
            box-shadow: 4px 4px 0 var(--accent-red);
            border-color: var(--accent-red) !important;
        }
        .admin-section {
            animation: fadeInUp 0.5s ease forwards;
        }

        /* Sidebar Styles for Admin on Desktop */
        @media (min-width: 992px) {
            body {
                flex-direction: row !important;
            }
            header {
                position: fixed !important;
                left: 0;
                top: 0;
                width: 280px;
                height: 100vh;
                border-bottom: none !important;
                border-right: 3px solid var(--accent-blue);
                overflow-y: auto;
            }
            .navbar {
                flex-direction: column !important;
                align-items: stretch !important;
                height: 100%;
                padding: 3rem 1.5rem !important;
                justify-content: flex-start !important;
                gap: 2rem;
                max-width: none !important;
            }
            .nav-logo {
                flex-direction: column !important;
                align-items: center !important;
                text-align: center;
                margin-bottom: 1rem;
            }
            .nav-logo img {
                width: 80px !important;
                height: 80px !important;
                margin-bottom: 1rem;
            }
            .nav-logo span {
                font-size: 1.1rem !important;
            }
            .nav-links {
                flex-direction: column !important;
                align-items: stretch !important;
                gap: 0.75rem !important;
                width: 100%;
            }
            .nav-links li {
                width: 100%;
            }
            .nav-links a {
                display: flex !important;
                align-items: center;
                gap: 12px;
                width: 100%;
                padding: 0.75rem 1rem !important;
                border: 2px solid transparent;
            }
            .nav-links a i {
                width: 20px;
                text-align: center;
            }
            main {
                margin-left: 280px;
                width: calc(100% - 280px) !important;
                padding: 3rem 2rem !important;
                flex: none !important;
            }
            footer {
                margin-left: 280px;
                width: calc(100% - 280px) !important;
                margin-top: 0 !important;
            }
            .mobile-menu-btn {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
            <a href="{{ url('/admin') }}" class="nav-logo">
                <img src="{{ asset('profil.jpg') }}" alt="Logo">
                <span>Panel Admin</span>
            </a>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}"><i class="fas fa-globe"></i> Lihat Situs</a></li>
                <li><a href="#dasbor" class="tab-btn active"><i class="fas fa-tachometer-alt"></i> Dasbor</a></li>
                <li><a href="#proyek" class="tab-btn"><i class="fas fa-project-diagram"></i> Mengelola Proyek</a></li>
                <li><a href="#prestasi" class="tab-btn"><i class="fas fa-certificate"></i> Prestasi</a></li>
                <li><a href="#galeri" class="tab-btn"><i class="fas fa-images"></i> Galeri</a></li>
                <li><a href="#pesan" class="tab-btn"><i class="fas fa-envelope"></i> Pesan</a></li>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main class="py-5">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-0 border-2" style="background: var(--bg-paper); border-color: var(--accent-blue); color: var(--accent-blue); box-shadow: 4px 4px 0 var(--accent-red);" role="alert">
                    <i class="fas fa-check-circle text-info me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-0 border-2" style="background: var(--bg-paper); border-color: var(--accent-red); color: var(--accent-red); box-shadow: 4px 4px 0 var(--accent-blue);" role="alert">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-exclamation-circle me-2"></i> 
                        <strong style="font-family: 'Space Mono', monospace;">Ada kesalahan:</strong>
                    </div>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    // Keep the last active tab or open the one with the error if possible
                    document.addEventListener('DOMContentLoaded', function() {
                        // Assuming the modal was closed, we just show the error in the current tab
                    });
                </script>
            @endif


            <!-- SECTION: DASBOR -->
            <div id="dasbor" class="admin-section">
                <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
                    <h1 class="display-5 fw-bold">Dasbor Utama</h1>
                </div>
                
                <div class="row g-4 mb-5">
                    <div class="col-md-4">
                        <div class="glass-card text-center">
                            <i class="fas fa-eye fa-3x text-info mb-3"></i>
                            <h4>{{ $totalViews }}</h4>
                            <p class="small text-secondary fw-bold mb-0" style="font-family: 'Space Mono', monospace;">Total Views</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="glass-card text-center">
                            <i class="fas fa-envelope fa-3x text-purple mb-3"></i>
                            <h4>{{ $newMessages }}</h4>
                            <p class="small text-secondary fw-bold mb-0" style="font-family: 'Space Mono', monospace;">Pesan Baru</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="glass-card text-center">
                            <i class="fas fa-project-diagram fa-3x text-warning mb-3"></i>
                            <h4>{{ $activeProjects }}</h4>
                            <p class="small text-secondary fw-bold mb-0" style="font-family: 'Space Mono', monospace;">Proyek Aktif</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECTION: MENGELOLA PROYEK -->
            <div id="proyek" class="admin-section" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
                    <h1 class="display-5 fw-bold">Mengelola Proyek</h1>
                    <button type="button" class="btn-neon" data-bs-toggle="modal" data-bs-target="#addProjectModal"><i class="fas fa-plus"></i> Tambah Proyek</button>
                </div>
                
                <div class="glass-card p-0 overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0" style="background: transparent;">
                            <thead style="border-bottom: 2px solid var(--accent-blue);">
                                <tr>
                                    <th class="p-4" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Nama Proyek</th>
                                    <th class="p-4" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Status</th>
                                    <th class="p-4 text-end" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($projects as $project)
                                <tr style="border-bottom: 1px solid var(--grid-line);">
                                    <td class="p-4" style="color: var(--text-primary); font-weight: bold;">{{ $project->title }}</td>
                                    <td class="p-4">
                                        @if($project->status == 'Aktif')
                                            <span class="badge" style="background: var(--accent-blue) !important; color: white !important;">{{ $project->status }}</span>
                                        @else
                                            <span class="badge" style="background: var(--accent-red) !important; color: white !important;">{{ $project->status }}</span>
                                        @endif
                                    </td>
                                    <td class="p-4 d-flex align-items-center justify-content-end">
                                        <button type="button" class="btn btn-link text-info p-0 me-3" data-bs-toggle="modal" data-bs-target="#editProjectModal{{ $project->id }}">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </button>
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus proyek ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-warning p-0">
                                                <i class="fas fa-trash fa-lg"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>


                                @empty
                                <tr>
                                    <td colspan="3" class="p-4 text-center text-secondary">Belum ada proyek. Klik "Tambah Proyek" untuk memulai.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- SECTION: PRESTASI -->
            <div id="prestasi" class="admin-section" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
                    <h1 class="display-5 fw-bold">Sertifikat & Prestasi</h1>
                    <button type="button" class="btn-neon" data-bs-toggle="modal" data-bs-target="#addAchievementModal"><i class="fas fa-plus"></i> Tambah Prestasi</button>
                </div>
                
                <div class="glass-card p-0 overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0" style="background: transparent;">
                            <thead style="border-bottom: 2px solid var(--accent-blue);">
                                <tr>
                                    <th class="p-4" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Nama Prestasi/Sertifikat</th>
                                    <th class="p-4" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Penerbit</th>
                                    <th class="p-4" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Tanggal</th>
                                    <th class="p-4 text-end" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($achievements as $achievement)
                                <tr style="border-bottom: 1px solid var(--grid-line);">
                                    <td class="p-4" style="color: var(--text-primary); font-weight: bold;">{{ $achievement->title }}</td>
                                    <td class="p-4" style="color: var(--text-secondary);">{{ $achievement->issuer }}</td>
                                    <td class="p-4" style="color: var(--text-secondary);">{{ $achievement->date ?? '-' }}</td>
                                    <td class="p-4 d-flex align-items-center justify-content-end">
                                        <button type="button" class="btn btn-link text-info p-0 me-3" data-bs-toggle="modal" data-bs-target="#editAchievementModal{{ $achievement->id }}">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </button>
                                        <form action="{{ route('admin.achievements.destroy', $achievement->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus prestasi ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-warning p-0">
                                                <i class="fas fa-trash fa-lg"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>


                                @empty
                                <tr>
                                    <td colspan="4" class="p-4 text-center text-secondary">Belum ada prestasi. Klik "Tambah Prestasi" untuk memulai.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- SECTION: GALERI -->
            <div id="galeri" class="admin-section" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
                    <h1 class="display-5 fw-bold">Galeri Foto</h1>
                    <button type="button" class="btn-neon" data-bs-toggle="modal" data-bs-target="#addGalleryModal"><i class="fas fa-plus"></i> Tambah Foto</button>
                </div>
                
                <div class="glass-card p-0 overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0" style="background: transparent;">
                            <thead style="border-bottom: 2px solid var(--accent-blue);">
                                <tr>
                                    <th class="p-4" style="font-family: 'Space Mono', monospace; color: var(--accent-blue); width: 100px;">Foto</th>
                                    <th class="p-4" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Judul/Keterangan</th>
                                    <th class="p-4" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Deskripsi</th>
                                    <th class="p-4 text-end" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($galleries as $item)
                                <tr style="border-bottom: 1px solid var(--grid-line);">
                                    <td class="p-4">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="img-thumbnail rounded-0 border-2 border-dark" style="width: 80px; height: 60px; object-fit: cover;">
                                    </td>
                                    <td class="p-4" style="color: var(--text-primary); font-weight: bold;">{{ $item->title }}</td>
                                    <td class="p-4" style="color: var(--text-secondary);">{{ $item->description ?? '-' }}</td>
                                    <td class="p-4 d-flex align-items-center justify-content-end" style="height: 93px;">
                                        <button type="button" class="btn btn-link text-info p-0 me-3" data-bs-toggle="modal" data-bs-target="#editGalleryModal{{ $item->id }}">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </button>
                                        <form action="{{ route('admin.galleries.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-warning p-0">
                                                <i class="fas fa-trash fa-lg"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>


                                @empty
                                <tr>
                                    <td colspan="4" class="p-4 text-center text-secondary">Belum ada foto galeri. Klik "Tambah Foto" untuk memulai.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- SECTION: PESAN -->
            <div id="pesan" class="admin-section" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
                    <h1 class="display-5 fw-bold">Pesan Masuk</h1>
                </div>
                
                <div class="glass-card text-center p-5">
                    <i class="fas fa-envelope-open-text fa-4x text-secondary mb-4" style="opacity: 0.5;"></i>
                    <h4 style="color: var(--accent-blue);">Belum Ada Pesan</h4>
                    <p class="text-secondary">Pesan yang dikirim oleh pengunjung melalui halaman kontak akan muncul di sini.</p>
                </div>
            </div>

        </div>
    </main>

    <!-- Add Project Modal -->
    <div class="modal fade" id="addProjectModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content glass-card p-4">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold" style="color: var(--accent-blue);">Tambah Proyek Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body text-secondary mt-3">
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Nama Proyek</label>
                            <input type="text" class="form-control rounded-0 border-2" name="title" required style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Gambar/Foto Proyek (Opsional)</label>
                            <input type="file" class="form-control rounded-0 border-2" name="image" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Teknologi (pisahkan dengan koma, misal: Python, HTML, JS)</label>
                            <input type="text" class="form-control rounded-0 border-2" name="technologies" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Deskripsi</label>
                            <textarea class="form-control rounded-0 border-2" name="description" rows="3" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Tautan Demo (Link)</label>
                            <input type="text" class="form-control rounded-0 border-2" name="demo_link" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Tautan Github (Opsional)</label>
                            <input type="text" class="form-control rounded-0 border-2" name="github_link" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Status</label>
                            <select class="form-select rounded-0 border-2" name="status" required style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                                <option value="Aktif" style="background: var(--bg-paper);">Aktif</option>
                                <option value="Selesai" style="background: var(--bg-paper);">Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 justify-content-between">
                        <button type="button" class="btn btn-outline-light rounded-0" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-neon border-0">Simpan Proyek</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Achievement Modal -->
    <div class="modal fade" id="addAchievementModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content glass-card p-4">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold" style="color: var(--accent-blue);">Tambah Prestasi Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body text-secondary mt-3">
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Judul Sertifikat/Prestasi</label>
                            <input type="text" class="form-control rounded-0 border-2" name="title" required style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Gambar Sertifikat/Prestasi (Opsional)</label>
                            <input type="file" class="form-control rounded-0 border-2" name="image" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Penerbit/Penyelenggara</label>
                            <input type="text" class="form-control rounded-0 border-2" name="issuer" required style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Tanggal Diperoleh</label>
                            <input type="text" class="form-control rounded-0 border-2" name="date" placeholder="Contoh: Agustus 2026" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Deskripsi (Opsional)</label>
                            <textarea class="form-control rounded-0 border-2" name="description" rows="3" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 justify-content-between">
                        <button type="button" class="btn btn-outline-light rounded-0" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-neon border-0">Simpan Prestasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Gallery Modal -->
    <div class="modal fade" id="addGalleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content glass-card p-4">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold" style="color: var(--accent-blue);">Tambah Foto Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body text-secondary mt-3">
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Judul Foto</label>
                            <input type="text" class="form-control rounded-0 border-2" name="title" required style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Pilih File Gambar</label>
                            <input type="file" class="form-control rounded-0 border-2" name="image" required style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Deskripsi (Opsional)</label>
                            <textarea class="form-control rounded-0 border-2" name="description" rows="3" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 justify-content-between">
                        <button type="button" class="btn btn-outline-light rounded-0" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-neon border-0">Simpan Foto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Project Modals -->
    @foreach($projects as $project)
    <div class="modal fade" id="editProjectModal{{ $project->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content glass-card p-4">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold" style="color: var(--accent-blue);">Edit Proyek</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body text-secondary mt-3">
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Nama Proyek</label>
                            <input type="text" class="form-control rounded-0 border-2" name="title" value="{{ $project->title }}" required style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Gambar/Foto Proyek (Kosongkan jika tidak ingin diganti)</label>
                            <input type="file" class="form-control rounded-0 border-2" name="image" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" class="mt-2" style="max-height: 100px; max-width: 100%;">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Teknologi (pisahkan dengan koma)</label>
                            <input type="text" class="form-control rounded-0 border-2" name="technologies" value="{{ $project->technologies }}" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Deskripsi</label>
                            <textarea class="form-control rounded-0 border-2" name="description" rows="3" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">{{ $project->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Tautan Demo (Link)</label>
                            <input type="text" class="form-control rounded-0 border-2" name="demo_link" value="{{ $project->demo_link }}" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Tautan Github (Opsional)</label>
                            <input type="text" class="form-control rounded-0 border-2" name="github_link" value="{{ $project->github_link }}" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Status</label>
                            <select class="form-select rounded-0 border-2" name="status" required style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                                <option value="Aktif" {{ $project->status == 'Aktif' ? 'selected' : '' }} style="background: var(--bg-paper);">Aktif</option>
                                <option value="Selesai" {{ $project->status == 'Selesai' ? 'selected' : '' }} style="background: var(--bg-paper);">Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 justify-content-between">
                        <button type="button" class="btn btn-outline-light rounded-0" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-neon border-0">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Edit Achievement Modals -->
    @foreach($achievements as $achievement)
    <div class="modal fade" id="editAchievementModal{{ $achievement->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content glass-card p-4">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold" style="color: var(--accent-blue);">Edit Prestasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body text-secondary mt-3">
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Judul Sertifikat/Prestasi</label>
                            <input type="text" class="form-control rounded-0 border-2" name="title" value="{{ $achievement->title }}" required style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Gambar Sertifikat/Prestasi (Kosongkan jika tidak ingin diganti)</label>
                            <input type="file" class="form-control rounded-0 border-2" name="image" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                            @if($achievement->image)
                                <img src="{{ asset('storage/' . $achievement->image) }}" class="mt-2" style="max-height: 100px; max-width: 100%;">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Penerbit/Penyelenggara</label>
                            <input type="text" class="form-control rounded-0 border-2" name="issuer" value="{{ $achievement->issuer }}" required style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Tanggal Diperoleh</label>
                            <input type="text" class="form-control rounded-0 border-2" name="date" value="{{ $achievement->date }}" placeholder="Contoh: Agustus 2026" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Deskripsi (Opsional)</label>
                            <textarea class="form-control rounded-0 border-2" name="description" rows="3" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">{{ $achievement->description }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 justify-content-between">
                        <button type="button" class="btn btn-outline-light rounded-0" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-neon border-0">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Edit Gallery Modals -->
    @foreach($galleries as $item)
    <div class="modal fade" id="editGalleryModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content glass-card p-4">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold" style="color: var(--accent-blue);">Edit Foto Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.galleries.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body text-secondary mt-3">
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Judul Foto</label>
                            <input type="text" class="form-control rounded-0 border-2" name="title" value="{{ $item->title }}" required style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Ganti Foto (Kosongkan jika tidak ingin diganti)</label>
                            <input type="file" class="form-control rounded-0 border-2" name="image" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-family: 'Space Mono', monospace; color: var(--accent-blue);">Deskripsi (Opsional)</label>
                            <textarea class="form-control rounded-0 border-2" name="description" rows="3" style="background: transparent; color: var(--text-primary); border-color: var(--accent-blue);">{{ $item->description }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 justify-content-between">
                        <button type="button" class="btn btn-outline-light rounded-0" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-neon border-0">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <footer>
        <div class="footer-bottom">
            <p>&copy; 2026 Admin Panel. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('script.js') }}"></script>
    <script>
        // Script to handle Tab Switching dynamically
        document.addEventListener('DOMContentLoaded', function() {
            const tabBtns = document.querySelectorAll('.tab-btn');
            const sections = document.querySelectorAll('.admin-section');

            function switchTab(tabId) {
                if(!document.querySelector(tabId)) return;
                
                // Hide all sections
                sections.forEach(sec => sec.style.display = 'none');
                
                // Remove active class from all tabs
                tabBtns.forEach(btn => btn.classList.remove('active'));

                // Show target section
                document.querySelector(tabId).style.display = 'block';
                
                // Add active class to target tab
                const activeBtn = document.querySelector(`.tab-btn[href="${tabId}"]`);
                if(activeBtn) activeBtn.classList.add('active');

                // Save to localStorage so it remembers the tab after refresh
                localStorage.setItem('activeAdminTab', tabId);
            }

            tabBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    switchTab(this.getAttribute('href'));
                });
            });

            // Restore tab on load
            const savedTab = localStorage.getItem('activeAdminTab');
            if(savedTab) {
                switchTab(savedTab);
            }

            // Script to handle Keahlian Category Show/Hide inputs
            document.querySelectorAll('.category-select').forEach(select => {
                select.addEventListener('change', function() {
                    const form = this.closest('form');
                    const percentGroup = form.querySelector('.percentage-group');
                    const iconGroup = form.querySelector('.icon-group');
                    
                    if (this.value === 'progress') {
                        percentGroup.style.display = 'block';
                        iconGroup.style.display = 'none';
                    } else {
                        percentGroup.style.display = 'none';
                        iconGroup.style.display = 'block';
                    }
                });
            });
        });
    </script>
</body>
</html>
