<!-- <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Xin chào</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white p-10">
    <h1 class="text-4xl font-bold text-red-500">oke {{ $ten }}!</h1>
</body>
</html> -->
@php
    // ====== DỮ LIỆU: sửa ở đây, không cần đụng vào HTML bên dưới ======
    $menu = [
        'Thông báo' => '#thong-bao',
        'Yêu cầu tài liệu' => '#',
        'Tài liệu trễ hạn' => '#',
        'Thư viện liên kết' => '#',
        'Nội quy' => '#',
        'Mượn liên thư viện' => '#',
    ];

    // [tiêu đề, mô tả, biểu tượng, màu nền, màu biểu tượng]
    $dichvu = [
        ['Yêu cầu tài liệu', 'Thư viện chưa có cuốn bạn cần? Gửi đề nghị để được bổ sung.', 'M12 4v16m8-8H4', '#e6f0ff', '#1e63e9'],
        ['Tài liệu trễ hạn', 'Xem sách đang mượn và ngày phải trả để không bị phạt.', 'M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z', '#fff1e0', '#e07a00'],
        ['Mượn liên thư viện', 'Mượn tài liệu từ các thư viện liên kết với HUFLIT.', 'M8 7h12M8 12h12M8 17h12M4 7h.01M4 12h.01M4 17h.01', '#e5f7ef', '#0f9d6b'],
        ['Nội quy thư viện', 'Quy định mượn, trả và sử dụng không gian đọc.', 'M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z', '#ffe9ee', '#e0334f'],
    ];

    // Năm nhóm ngành đào tạo của HUFLIT
    $nganh = [
        'Ngôn ngữ & Văn hóa',
        'Công nghệ thông tin',
        'Kinh tế & Luật',
        'Kinh doanh – Quản lý – Dịch vụ',
        'Truyền thông – Đối ngoại – Sự kiện',
    ];

    $sach = [
        ['Tên sách mẫu 1', 'Tác giả A', '#1e63e9'],
        ['Tên sách mẫu 2', 'Tác giả B', '#f59e0b'],
        ['Tên sách mẫu 3', 'Tác giả C', '#e0334f'],
        ['Tên sách mẫu 4', 'Tác giả D', '#0f9d6b'],
        ['Tên sách mẫu 5', 'Tác giả E', '#7c5cff'],
    ];

    $thongbao = [
        ['Nội dung thông báo số 1 sẽ hiển thị ở đây', '29/09/2026'],
        ['Nội dung thông báo số 2 sẽ hiển thị ở đây', '25/09/2026'],
        ['Nội dung thông báo số 3 sẽ hiển thị ở đây', '18/09/2026'],
    ];

    $coso = [
        ['Sư Vạn Hạnh', '828 Sư Vạn Hạnh, Phường Hòa Hưng'],
        ['Hóc Môn', '806 Lê Quang Đạo, Xã Hóc Môn'],
        ['Ba Gia', '52–70 Ba Gia, Phường Tân Sơn Nhất'],
        ['Trường Sơn', '32 Trường Sơn, Phường Tân Sơn Hòa'],
    ];
@endphp
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thư viện HUFLIT</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Đổi màu cả trang ở đây */
        :root { --ink: #0f2a56; --blue: #1e63e9; --sky: #eef5ff; --coral: #e0334f; --sun: #ffc93c; }
        html { scroll-behavior: smooth; }
        a:focus-visible, button:focus-visible, input:focus-visible {
            outline: 3px solid var(--blue); outline-offset: 2px;
        }
        /* Hai bong bóng chào hỏi trôi nhẹ: chuyển động duy nhất của trang */
        @keyframes nhe { 0%,100% { transform: translateY(0) } 50% { transform: translateY(-8px) } }
        .troi { animation: nhe 5s ease-in-out infinite; }
        .troi-2 { animation-delay: -2.5s; }
        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; } .troi { animation: none; }
        }
    </style>
</head>
<body class="bg-white text-slate-700 antialiased">

    {{-- ===== THANH TRÊN CÙNG ===== --}}
    <div class="bg-[var(--sky)] text-sm text-[var(--ink)]">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-5 py-2">
            <a href="https://huflit.edu.vn/vi/" class="font-medium hover:text-[var(--blue)]">← Trang chủ HUFLIT</a>
            <div class="flex gap-5 font-medium">
                <a href="https://portal.huflit.edu.vn/" class="hover:text-[var(--blue)]">Sinh viên</a>
                <a href="mailto:contact@huflit.edu.vn" class="hover:text-[var(--blue)]">Liên hệ</a>
            </div>
        </div>
    </div>

    {{-- ===== MENU ===== --}}
    <header class="sticky top-0 z-30 border-b border-slate-100 bg-white/95 backdrop-blur">
        <div class="mx-auto flex max-w-6xl items-center gap-8 px-5 py-4">
            <a href="/" class="flex shrink-0 items-center gap-2 text-xl font-bold tracking-tight text-[var(--ink)]">
                <span class="grid h-9 w-9 place-items-center rounded-lg bg-[var(--blue)] text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.25v13m0-13C10.8 5.5 9.2 5 7.5 5S4.2 5.5 3 6.25v13C4.2 18.5 5.8 18 7.5 18s3.3.5 4.5 1.25m0-13C13.2 5.5 14.8 5 16.5 5s3.3.5 4.5 1.25v13C19.8 18.5 18.2 18 16.5 18s-3.3.5-4.5 1.25"/>
                    </svg>
                </span>
                Thư viện HUFLIT
            </a>
            <nav class="-mx-2 flex flex-1 gap-1 overflow-x-auto" aria-label="Menu chính">
                @foreach ($menu as $ten => $link)
                    <a href="{{ $link }}"
                       class="whitespace-nowrap rounded-full px-4 py-2 text-[15px] font-medium text-slate-600 hover:bg-[var(--sky)] hover:text-[var(--blue)]">
                        {{ $ten }}
                    </a>
                @endforeach
            </nav>
        </div>
    </header>

    <main>
        {{-- ===== HERO ===== --}}
        <section class="relative overflow-hidden bg-gradient-to-b from-[var(--sky)] to-white">
            <div class="mx-auto grid max-w-6xl items-center gap-12 px-5 py-14 md:py-20 lg:grid-cols-[1.1fr_0.9fr]">
                <div>
                    <h1 class="text-4xl font-bold leading-[1.15] text-[var(--ink)] md:text-6xl">
                        Mở sách, mở ra cả thế giới ngôn ngữ
                    </h1>
                    <p class="mt-5 max-w-lg text-lg leading-relaxed text-slate-600">
                        Tra cứu giáo trình, sách chuyên ngành và tài liệu ngoại ngữ của HUFLIT. Kiểm tra sách đang mượn và gửi yêu cầu chỉ trong vài bước.
                    </p>

                    {{-- Đổi action thành địa chỉ tìm kiếm thật của thư viện --}}
                    <form action="#" method="get"
                          class="mt-9 flex max-w-xl items-center gap-2 rounded-full bg-white p-2 shadow-lg shadow-blue-900/10 ring-1 ring-slate-200">
                        <label for="q" class="sr-only">Từ khóa tìm kiếm</label>
                        <svg class="ml-4 h-5 w-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"/>
                        </svg>
                        <input id="q" name="q" type="search" placeholder="Tên sách, tác giả hoặc từ khóa"
                               class="h-12 min-w-0 flex-1 border-0 bg-transparent px-2 text-base text-slate-900 placeholder:text-slate-400 focus:ring-0">
                        <button type="submit"
                                class="h-12 shrink-0 rounded-full bg-[var(--blue)] px-7 text-base font-semibold text-white hover:brightness-110">
                            Tìm kiếm
                        </button>
                    </form>
                </div>

                {{-- Minh họa: kệ sách + lời chào bằng 4 ngôn ngữ (không cần ảnh) --}}
                <div class="relative mx-auto h-72 w-full max-w-md md:h-80" aria-hidden="true">
                    <div class="absolute inset-x-4 bottom-6 flex items-end gap-2">
                        @foreach ([[150,'#1e63e9'],[190,'#ffc93c'],[130,'#e0334f'],[210,'#0f9d6b'],[165,'#7c5cff'],[195,'#1e63e9'],[140,'#f59e0b'],[175,'#e0334f']] as [$cao, $mau])
                            <div class="flex-1 rounded-t-md" style="height: {{ $cao }}px; background: {{ $mau }}">
                                <div class="mx-auto mt-3 h-1 w-3/5 rounded bg-white/50"></div>
                                <div class="mx-auto mt-1.5 h-1 w-2/5 rounded bg-white/35"></div>
                            </div>
                        @endforeach
                    </div>
                    <div class="absolute inset-x-0 bottom-3 h-3 rounded-full bg-[var(--ink)]"></div>

                    <span class="troi absolute left-0 top-2 rounded-2xl rounded-bl-sm bg-white px-4 py-2 text-lg font-semibold text-[var(--ink)] shadow-lg ring-1 ring-slate-100">Hello</span>
                    <span class="troi troi-2 absolute right-2 top-0 rounded-2xl rounded-br-sm bg-white px-4 py-2 text-lg font-semibold text-[var(--coral)] shadow-lg ring-1 ring-slate-100">你好</span>
                    <span class="troi troi-2 absolute left-6 top-24 rounded-2xl rounded-bl-sm bg-white px-4 py-2 text-lg font-semibold text-[var(--blue)] shadow-lg ring-1 ring-slate-100">こんにちは</span>
                    <span class="troi absolute right-0 top-28 rounded-2xl rounded-br-sm bg-white px-4 py-2 text-lg font-semibold text-emerald-600 shadow-lg ring-1 ring-slate-100">안녕하세요</span>
                </div>
            </div>
        </section>

        {{-- ===== DỊCH VỤ ===== --}}
        <section class="mx-auto max-w-6xl px-5 py-16">
            <h2 class="text-3xl font-bold text-[var(--ink)]">Bạn cần làm gì hôm nay?</h2>
            <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($dichvu as [$tieude, $mota, $icon, $nen, $mau])
                    <a href="#" class="group rounded-2xl p-6 transition-shadow hover:shadow-xl hover:shadow-blue-900/10"
                       style="background: {{ $nen }}">
                        <span class="grid h-12 w-12 place-items-center rounded-xl bg-white shadow-sm" style="color: {{ $mau }}">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/>
                            </svg>
                        </span>
                        <h3 class="mt-5 text-lg font-semibold text-[var(--ink)] group-hover:underline">{{ $tieude }}</h3>
                        <p class="mt-2 text-[15px] leading-relaxed text-slate-600">{{ $mota }}</p>
                    </a>
                @endforeach
            </div>
        </section>

        {{-- ===== TÀI LIỆU THEO NHÓM NGÀNH ===== --}}
        <section class="mx-auto max-w-6xl px-5 pb-16">
            <h2 class="text-3xl font-bold text-[var(--ink)]">Tìm tài liệu theo nhóm ngành</h2>
            <div class="mt-6 flex flex-wrap gap-3">
                @foreach ($nganh as $ten)
                    <a href="#" class="rounded-full border border-slate-200 bg-white px-5 py-3 text-[15px] font-medium text-[var(--ink)] hover:border-[var(--blue)] hover:bg-[var(--sky)] hover:text-[var(--blue)]">
                        {{ $ten }}
                    </a>
                @endforeach
            </div>
        </section>

        {{-- ===== GIỚI THIỆU SÁCH ===== --}}
        <section class="bg-[var(--sky)]">
            <div class="mx-auto max-w-6xl px-5 py-16">
                <div class="flex items-end justify-between gap-4">
                    <h2 class="text-3xl font-bold text-[var(--ink)]">Giới thiệu sách</h2>
                    <a href="#" class="text-[15px] font-semibold text-[var(--blue)] hover:underline">Xem tất cả</a>
                </div>
                <div class="mt-8 grid grid-cols-2 gap-6 md:grid-cols-3 lg:grid-cols-5">
                    @foreach ($sach as [$ten, $tacgia, $mau])
                        <a href="#" class="group block">
                            {{-- Thay khối màu này bằng <img> bìa sách thật --}}
                            <div class="flex aspect-[3/4] items-end rounded-xl p-4 shadow-lg shadow-blue-900/15 transition-transform group-hover:-translate-y-1"
                                 style="background: {{ $mau }}">
                                <span class="text-lg font-semibold leading-snug text-white">{{ $ten }}</span>
                            </div>
                            <p class="mt-3 text-[15px] font-semibold text-[var(--ink)] group-hover:underline">{{ $ten }}</p>
                            <p class="text-sm text-slate-500">{{ $tacgia }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ===== THÔNG BÁO + GIỜ MỞ CỬA ===== --}}
        <section id="thong-bao" class="mx-auto grid max-w-6xl gap-12 px-5 py-16 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-bold text-[var(--ink)]">Thông báo mới</h2>
                <ul class="mt-6 divide-y divide-slate-100 rounded-2xl border border-slate-200">
                    @foreach ($thongbao as [$noidung, $ngay])
                        <li>
                            <a href="#" class="flex items-baseline justify-between gap-6 px-6 py-5 hover:bg-[var(--sky)]">
                                <span class="text-lg font-medium text-[var(--ink)]">{{ $noidung }}</span>
                                <time class="shrink-0 text-sm text-slate-500">{{ $ngay }}</time>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <aside class="self-start rounded-2xl bg-[var(--ink)] p-8 text-white">
                <h2 class="text-2xl font-bold">Giờ mở cửa</h2>
                {{-- Cập nhật giờ thật của thư viện --}}
                <dl class="mt-5 space-y-3 text-[15px]">
                    <div class="flex justify-between border-b border-white/15 pb-3">
                        <dt class="text-white/70">Thứ Hai – Thứ Sáu</dt><dd>__:__ – __:__</dd>
                    </div>
                    <div class="flex justify-between border-b border-white/15 pb-3">
                        <dt class="text-white/70">Thứ Bảy</dt><dd>__:__ – __:__</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-white/70">Chủ nhật</dt><dd>Nghỉ</dd>
                    </div>
                </dl>
                <a href="mailto:contact@huflit.edu.vn"
                   class="mt-8 inline-block rounded-full bg-[var(--sun)] px-6 py-3 text-[15px] font-semibold text-[var(--ink)] hover:brightness-95">
                    Gửi câu hỏi cho thư viện
                </a>
            </aside>
        </section>
    </main>

    {{-- ===== CHÂN TRANG ===== --}}
    <footer class="bg-[var(--sky)]">
        <div class="mx-auto max-w-6xl px-5 py-12">
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($coso as [$ten, $diachi])
                    <div>
                        <h3 class="font-semibold text-[var(--ink)]">Cơ sở {{ $ten }}</h3>
                        <p class="mt-1 text-[15px] text-slate-600">{{ $diachi }}, TP. Hồ Chí Minh</p>
                    </div>
                @endforeach
            </div>
            <p class="mt-10 border-t border-blue-100 pt-6 text-sm text-slate-500">
                © {{ date('Y') }} Thư viện HUFLIT · Trường Đại học Ngoại ngữ – Tin học TP. Hồ Chí Minh
            </p>
        </div>
    </footer>

</body>
</html>