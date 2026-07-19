<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleet Administration | Car Airport Morocco</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-dark: #0f1d36;
            --accent-gold: #c5a059;
            --text-dark: #334155;
            --bg-light: #f8fafc;
            --border-color: #cbd5e1;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            padding-bottom: 5rem;
        }
        
        header {
            background-color: var(--primary-dark);
            color: white;
            padding: 1.2rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        header h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
            color: var(--accent-gold);
        }
        
        .header-links a {
            color: white;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            background: rgba(255,255,255,0.1);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: background 0.3s;
        }
        
        .header-links a:hover {
            background: var(--accent-gold);
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }
        
        /* Stats Widgets */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            border-left: 4px solid var(--accent-gold);
        }
        
        .stat-card h3 {
            font-size: 0.8rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }
        
        .stat-card .value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-dark);
        }
        
        /* Layout Grid */
        .admin-grid {
            display: grid;
            grid-template-columns: 1.8fr 1.2fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .panel {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
        }
        
        .panel h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 0.75rem;
        }
        
        /* Forms styling */
        .form-group {
            margin-bottom: 1.2rem;
        }
        
        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 0.4rem;
            color: #475569;
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.7rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            outline: none;
            font-family: inherit;
        }
        
        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--accent-gold);
        }
        
        .btn-submit {
            background: var(--primary-dark);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            transition: opacity 0.3s;
        }
        
        .btn-submit:hover {
            opacity: 0.9;
        }
        
        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
            margin-top: 1rem;
        }
        
        th, td {
            padding: 0.75rem 1rem;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        
        th {
            background-color: #f8fafc;
            font-weight: 600;
            color: #475569;
        }
        
        tr:hover {
            background-color: #faf5eb;
        }
        
        .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 700;
            display: inline-block;
        }
        
        .badge-pending { background-color: #fef3c7; color: #d97706; }
        .badge-confirmed { background-color: #d1fae5; color: #065f46; }
        .badge-cancelled { background-color: #fee2e2; color: #991b1b; }
        
        .badge-source-whatsapp { background-color: #dcfce7; color: #15803d; }
        .badge-source-web { background-color: #e0f2fe; color: #0369a1; }
        .badge-source-ota { background-color: #f3e8ff; color: #6b21a8; }
        
        /* Alert message */
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10000;
            justify-content: center;
            align-items: center;
            padding: 1.5rem;
        }

        .modal-content {
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            max-width: 600px;
            width: 100%;
            position: relative;
            box-shadow: 0 10px 25px rgba(15, 29, 54, 0.2);
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-dark);
        }
    </style>
</head>
<body>

    <header>
        <h1>Car Airport Morocco - Fleet Manager</h1>
        <div class="header-links" style="display: flex; gap: 1rem; align-items: center;">
            <a href="/{{ $locale }}" target="_blank">View Main Site</a>
            <form action="/{{ $locale }}/admin/logout" method="POST" style="margin: 0; padding: 0; display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #fca5a5; font-weight: 600; cursor: pointer; font-size: 0.95rem;">Logout</button>
            </form>
        </div>
    </header>

    <div class="container">
        
        @if(session('success'))
        <div class="alert-success">
            ✓ {{ session('success') }}
        </div>
        @endif
        
        <!-- Global Month Selector Bar -->
        <form method="GET" action="" id="monthFilterForm" style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 1rem; background: var(--bg-light); padding: 0.85rem 1.25rem; border-radius: 10px; border: 1px solid var(--border-color);">
            <span style="font-weight: 700; font-size: 0.85rem; color: var(--primary-dark);">📅 Viewing Month:</span>
            <select name="month" onchange="this.form.submit()" style="padding: 0.4rem 0.8rem; border-radius: 6px; border: 1px solid #cbd5e1; font-weight: 600; font-size: 0.88rem; color: var(--primary-dark); cursor: pointer; background: #fff;">
                @foreach($monthOptions as $opt)
                <option value="{{ $opt['value'] }}" {{ $opt['selected'] ? 'selected' : '' }}>{{ $opt['label'] }}</option>
                @endforeach
                <option value="__3m" {{ $selectedMonth === '__3m' ? 'selected' : '' }}>Next 3 Months (combined)</option>
                <option value="__6m" {{ $selectedMonth === '__6m' ? 'selected' : '' }}>Next 6 Months (combined)</option>
            </select>
            <span style="font-size: 0.8rem; color: var(--text-muted);">All panels below reflect the selected month</span>
        </form>

        <!-- Stats Widgets (all filtered by selected month) -->
        <div class="stats-grid" style="margin-bottom: 2rem;">
            <div class="stat-card">
                <h3>Total Fleet Size</h3>
                <div class="value">{{ $cars->sum('quantity') }} Vehicles</div>
            </div>

            <div class="stat-card">
                <h3>Confirmed Bookings</h3>
                <div class="value">{{ $selectedMonthData['bookings'] }} Confirmed</div>
                <div style="font-size:0.78rem;color:var(--text-muted);margin-top:0.25rem;">{{ $filterDate->format('F Y') }}</div>
            </div>

            <div class="stat-card">
                <h3>Pending Bookings</h3>
                <div class="value">{{ $selectedMonthData['pending'] }} Pending</div>
                <div style="font-size:0.78rem;color:var(--text-muted);margin-top:0.25rem;">{{ $filterDate->format('F Y') }}</div>
            </div>

            <div class="stat-card" style="border-left: 4px solid #10b981;">
                <h3>Projected Revenue</h3>
                <div class="value" style="color: #10b981;">{{ number_format($selectedMonthData['revenue']) }} DH</div>
                <div style="font-size:0.78rem;color:var(--text-muted);margin-top:0.25rem;">{{ $filterDate->format('F Y') }} · Confirmed only</div>
            </div>
        </div>

        <div class="stats-grid" style="margin-bottom: 2rem; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
            <div class="stat-card" style="border-left: 4px solid #ef4444;">
                <h3>Monthly Expenses</h3>
                <div class="value" style="color: #ef4444;">{{ number_format($selectedMonthData['expenses']) }} DH</div>
                <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.25rem;">Fixed + Manual · {{ $filterDate->format('M Y') }}</div>
            </div>

            <div class="stat-card" style="border-left: 4px solid #c5a059;">
                <h3>Net Projected Profit</h3>
                <div class="value" style="color: {{ $selectedMonthData['net'] >= 0 ? '#c5a059' : '#ef4444' }};">{{ number_format($selectedMonthData['net']) }} DH</div>
                <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.25rem;">Revenue − Expenses</div>
            </div>

            <div class="stat-card" style="grid-column: span 2;">
                <h3>Unique Visitors (24h / 7d / 30d) <a href="#" onclick="openVisitsModal()" style="font-size: 0.8rem; text-decoration: underline; margin-left: 0.75rem; color: var(--accent-gold); font-weight: 600;">View Countries & History</a></h3>
                <div class="value" style="font-size: 1.5rem; padding-top: 0.5rem;">
                    <strong>{{ $visits24h }}</strong> <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 500;">last 24h</span>
                    &nbsp;|&nbsp; <strong>{{ $visits7d }}</strong> <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 500;">7 days</span>
                    &nbsp;|&nbsp; <strong>{{ $visits30d }}</strong> <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 500;">30 days</span>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="tabs-navigation" style="display: flex; gap: 1rem; border-bottom: 2px solid var(--border-color); margin-bottom: 2rem;">
            <button class="tab-btn active" onclick="switchTab('fleet-tab')" id="btn-fleet-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--primary-dark); border-bottom: 3px solid var(--accent-gold); font-size: 1rem;">🏠 Fleet & Pricing</button>
            <button class="tab-btn" onclick="switchTab('extras-tab')" id="btn-extras-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--text-dark); border-bottom: 3px solid transparent; font-size: 1rem; opacity: 0.75;">🎁 Optional Extras</button>
            <button class="tab-btn" onclick="switchTab('expenses-tab')" id="btn-expenses-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--text-dark); border-bottom: 3px solid transparent; font-size: 1rem; opacity: 0.75;">💸 Expense Follow-Up</button>
            <button class="tab-btn" onclick="switchTab('bookings-tab')" id="btn-bookings-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--text-dark); border-bottom: 3px solid transparent; font-size: 1rem; opacity: 0.75;">📅 Reservation Log</button>
            <button class="tab-btn" onclick="switchTab('contacts-tab')" id="btn-contacts-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--text-dark); border-bottom: 3px solid transparent; font-size: 1rem; opacity: 0.75;">💬 Contact Messages</button>
        </div>

        <!-- tab 2: Optional Extras Management -->
        <div id="extras-tab" class="tab-content" style="display:none;">
            <div class="admin-grid">
                <!-- Left: Extras Table -->
                <div class="panel">
                    <h2>Optional Extras Catalogue</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Price</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($extras as $extra)
                            <tr>
                                <td><strong>{{ $extra->name }}</strong></td>
                                <td><code>{{ $extra->slug }}</code></td>
                                <td><strong>{{ $extra->price }} DH</strong></td>
                                <td>
                                    <span class="badge" style="background: {{ $extra->type === 'per_day' ? '#e0f2fe; color:#0369a1' : '#f3e8ff; color:#6b21a8' }};">
                                        {{ $extra->type === 'per_day' ? '/day' : 'Flat' }}
                                    </span>
                                </td>
                                <td style="font-size:0.8rem; color:#64748b;">{{ $extra->description ?? '—' }}</td>
                                <td>
                                    <a href="#" onclick="openEditExtraModal({{ json_encode($extra) }})" style="color: #c5a059; margin-right: 0.5rem; text-decoration: none; font-weight: 600;">Edit</a>
                                    <form action="/{{ $locale }}/admin/extras/{{ $extra->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this extra?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color:red; background:none; border:none; cursor:pointer; font-weight:600;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Right: Add New Extra Form -->
                <div class="panel">
                    <h2>Add New Extra</h2>
                    <form action="/{{ $locale }}/admin/extras" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Display Name</label>
                            <input type="text" name="name" required placeholder="e.g. Full Insurance (CDW)">
                        </div>
                        <div class="form-group">
                            <label>Slug (unique identifier)</label>
                            <input type="text" name="slug" required placeholder="e.g. insurance">
                        </div>
                        <div style="display:flex; gap:1rem;">
                            <div class="form-group" style="flex:1;">
                                <label>Price (DH)</label>
                                <input type="number" name="price" min="0" step="0.01" required placeholder="150">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label>Charge Type</label>
                                <select name="type">
                                    <option value="per_day">Per Day</option>
                                    <option value="flat">Flat Fee</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description (Optional)</label>
                            <input type="text" name="description" placeholder="e.g. Zero liability coverage for damages">
                        </div>
                        <button type="submit" class="btn-submit">Add Extra</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- tab 1: Fleet & Pricing -->
        <div id="fleet-tab" class="tab-content">
            <!-- Section 1: Fleet Management & Add Car -->
            <div class="admin-grid">
            <div class="panel">
                <h2>Active Fleet Vehicles</h2>
                
                <table>
                    <thead>
                        <tr>
                            <th>Car Model</th>
                            <th>Model Year</th>
                            <th>Category</th>
                            <th>Qty</th>
                            <th>Base Rate</th>
                            <th>Monthly Exp</th>
                            <th>Inspection / EOL</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                        @php
                            $modelYear  = $car->model_year;
                            $modelMonth = $car->model_month ?? 1;
                            $registrationDate = $modelYear ? \Carbon\Carbon::create($modelYear, $modelMonth, 1) : null;
                            // Morocco: first technical inspection after 4 years, then every 2 years
                            $firstInspection = $registrationDate ? $registrationDate->copy()->addYears(4) : null;
                            $nextInspection  = null;
                            if ($firstInspection) {
                                $nextInspection = $firstInspection->isPast()
                                    ? $firstInspection->copy()->addYears(ceil($firstInspection->diffInYears(now()) / 2) * 2)
                                    : $firstInspection;
                            }
                            // Morocco: rental car mandatory end-of-service at 5 years
                            $eolDate = $registrationDate ? $registrationDate->copy()->addYears(5) : null;
                            $eolDays = $eolDate ? now()->diffInDays($eolDate, false) : null;
                            $inspDays = $nextInspection ? now()->diffInDays($nextInspection, false) : null;
                        @endphp
                        <tr>
                            <td><strong>{{ $car->brand }} {{ $car->model }}</strong></td>
                            <td>
                                @if($modelYear)
                                    {{ $modelYear }}/{{ str_pad($modelMonth, 2, '0', STR_PAD_LEFT) }}
                                @else
                                    <span style="color:#94a3b8;">—</span>
                                @endif
                            </td>
                            <td>{{ $car->category }}</td>
                            <td>{{ $car->quantity }}</td>
                            <td>{{ $car->base_price }} DH</td>
                            <td>
                                <span style="font-weight:600; color: #ef4444;">
                                    {{ $car->loan_cost + $car->insurance_cost + $car->maintenance_cost + $car->fuel_cost + $car->other_cost }} DH
                                </span>
                            </td>
                            <td style="font-size:0.78rem; min-width:140px;">
                                @if($nextInspection)
                                    <div style="color: {{ $inspDays !== null && $inspDays <= 60 ? '#ef4444' : ($inspDays !== null && $inspDays <= 180 ? '#f59e0b' : '#10b981') }}; font-weight:600;">
                                        🔧 {{ $nextInspection->format('M Y') }}
                                        @if($inspDays !== null && $inspDays <= 60)<span style="font-size:0.7rem;"> ⚠️ Soon</span>@endif
                                    </div>
                                @endif
                                @if($eolDate)
                                    <div style="color: {{ $eolDays !== null && $eolDays <= 90 ? '#ef4444' : ($eolDays !== null && $eolDays <= 365 ? '#f59e0b' : '#64748b') }}; margin-top:2px;">
                                        🚫 EOL: {{ $eolDate->format('M Y') }}
                                        @if($eolDays !== null && $eolDays <= 90)<span style="font-size:0.7rem;"> ⚠️ Retire</span>@endif
                                    </div>
                                @endif
                                @if(!$modelYear)<span style="color:#94a3b8;">No date set</span>@endif
                            </td>
                            <td>
                                <a href="#" id="btn-edit-car-{{ $car->id }}" onclick="openEditModal({{ json_encode($car) }})" style="color: #c5a059; margin-right: 0.5rem; text-decoration: none; font-weight: 600;">Edit</a>
                                <form action="/{{ $locale }}/admin/cars/{{ $car->id }}" method="POST" onsubmit="return confirm('Remove vehicle from database?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:red; background:none; border:none; cursor:pointer; font-weight: 600;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="panel">
                <h2>Add Vehicle to Fleet</h2>
                <form action="/{{ $locale }}/admin/cars" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" name="brand" placeholder="e.g. Dacia" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Model Name</label>
                        <input type="text" name="model" placeholder="e.g. Logan" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category">
                            <option value="Economy">Economy</option>
                            <option value="SUV">SUV</option>
                            <option value="Van">Van</option>
                            <option value="Luxury">Luxury</option>
                        </select>
                    </div>
                    
                    <div style="display: flex; gap: 1rem;">
                        <div class="form-group" style="flex: 1;">
                            <label>Seats Count</label>
                            <input type="number" name="seats" value="5" min="2" max="15" required>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label>Transmission</label>
                            <select name="transmission">
                                <option value="Manual">Manual</option>
                                <option value="Automatic">Automatic</option>
                            </select>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 1rem;">
                        <div class="form-group" style="flex: 1;">
                            <label>Fleet Quantity</label>
                            <input type="number" name="quantity" value="1" min="1" required>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label>Base Price per Day (DH)</label>
                            <input type="number" name="base_price" placeholder="350" required>
                        </div>
                    </div>

                    <div style="display: flex; gap: 1rem;">
                        <div class="form-group" style="flex: 1;">
                            <label>Model Year <span style="font-size:0.72rem; color:var(--text-muted);">(for inspection tracking)</span></label>
                            <input type="number" name="model_year" min="2000" max="{{ date('Y') }}" placeholder="{{ date('Y') }}">
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label>Model Month</label>
                            <select name="model_month">
                                <option value="">— Select —</option>
                                @foreach(['Jan'=>1,'Feb'=>2,'Mar'=>3,'Apr'=>4,'May'=>5,'Jun'=>6,'Jul'=>7,'Aug'=>8,'Sep'=>9,'Oct'=>10,'Nov'=>11,'Dec'=>12] as $mn => $mv)
                                <option value="{{ $mv }}">{{ $mn }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.5rem;">
                        <label style="display:flex; gap:0.5rem; align-items:center; font-size: 0.8rem; font-weight:600; cursor:pointer;">
                            <input type="checkbox" name="ac" checked style="width:auto;"> Include AC
                        </label>
                        <label style="display:flex; gap:0.5rem; align-items:center; font-size: 0.8rem; font-weight:600; cursor:pointer;">
                            <input type="checkbox" name="allow_overbooking" style="width:auto;"> Allow Overbooking (Overpass limits)
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Static Image URL path</label>
                        <input type="text" name="image_path" placeholder="/images/dacia_logan.jpg">
                    </div>
                    
                    <div class="form-group">
                        <label>Hover MP4 Video URL path</label>
                        <input type="text" name="video_path" placeholder="/videos/dacia_logan.mp4">
                    </div>

                    <div style="margin-top: 1rem; border-top: 1px solid var(--border-color); padding-top: 1rem;">
                        <h3 style="font-size: 0.9rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 0.75rem;">Monthly Operating Expenses (DH)</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-bottom: 1.5rem;">
                            <div class="form-group">
                                <label>Loan/Lease Fee</label>
                                <input type="number" name="loan_cost" value="0" min="0">
                            </div>
                            <div class="form-group">
                                <label>Insurance Fee</label>
                                <input type="number" name="insurance_cost" value="0" min="0">
                            </div>
                            <div class="form-group">
                                <label>Service/Maintenance</label>
                                <input type="number" name="maintenance_cost" value="0" min="0">
                            </div>
                            <div class="form-group">
                                <label>Fuel Cost</label>
                                <input type="number" name="fuel_cost" value="0" min="0">
                            </div>
                            <div class="form-group" style="grid-column: span 2;">
                                <label>Other Fees (Taxes, cleaning...)</label>
                                <input type="number" name="other_cost" value="0" min="0">
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-submit">Save New Vehicle</button>
                </form>
            </div>
        </div>

        <!-- Section 2: Seasonal Pricing & Rules -->
        <div class="admin-grid">
            <div class="panel">
                <h2>Active Seasonal Adjustments</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Rule Name</th>
                            <th>Vehicle Filter</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Adjustment</th>
                            <th>Value</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seasonalPrices as $rule)
                        <tr>
                            <td><strong>{{ $rule->name }}</strong></td>
                            <td>{{ $rule->car ? $rule->car->brand . ' ' . $rule->car->model : 'All Vehicles' }}</td>
                            <td>{{ $rule->start_date }}</td>
                            <td>{{ $rule->end_date }}</td>
                            <td>{{ $rule->adjustment_type == 'percentage' ? 'Percentage' : 'Flat Price Override' }}</td>
                            <td>
                                {{ $rule->adjustment_type == 'percentage' ? ($rule->value > 1.0 ? '+' . (($rule->value - 1.0)*100) . '%' : ($rule->value*100) . '%') : ($rule->value . ' DH') }}
                            </td>
                            <td>
                                <form action="/{{ $locale }}/admin/pricing/{{ $rule->id }}" method="POST" onsubmit="return confirm('Remove this rule?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="panel">
                <h2>Add Seasonal Price Rule</h2>
                <form action="/{{ $locale }}/admin/pricing" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Rule Name</label>
                        <input type="text" name="name" placeholder="e.g. Summer Season Peak" required>
                    </div>

                    <div class="form-group">
                        <label>Apply to Vehicle</label>
                        <select name="car_id">
                            <option value="">All Vehicles (Global)</option>
                            @foreach($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="display:flex; gap:1rem;">
                        <div class="form-group" style="flex:1;">
                            <label>Start Date</label>
                            <input type="date" name="start_date" required>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label>End Date</label>
                            <input type="date" name="end_date" required>
                        </div>
                    </div>

                    <div style="display:flex; gap:1rem;">
                        <div class="form-group" style="flex:1;">
                            <label>Adjustment Type</label>
                            <select name="adjustment_type">
                                <option value="percentage">Percentage Multiplier</option>
                                <option value="flat_rate">Flat Price Override</option>
                            </select>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label>Value</label>
                            <input type="number" step="0.01" name="value" placeholder="e.g. 1.30 or 400" required>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">Save Pricing Rule</button>
                </form>
            </div>
        </div>
        </div> <!-- End of fleet-tab -->

        <!-- tab 2: Expense Follow-Up -->
        <div id="expenses-tab" class="tab-content" style="display: none;">
            <div class="admin-grid">
                
                <!-- Left: Automated Fixed Fleet Expenses -->
                <div class="panel">
                    <h2>Fleet Fixed Expenses (Automated)</h2>
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.5rem;">These expenses (loans & insurance) are calculated automatically based on your active fleet configuration.</p>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Car Model</th>
                                <th>Qty</th>
                                <th>Monthly Loan</th>
                                <th>Monthly Insurance</th>
                                <th>Subtotal (Fixed)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totFixed = 0; @endphp
                            @foreach($cars as $car)
                            @php 
                                $carFixed = ($car->loan_cost + $car->insurance_cost) * $car->quantity;
                                $totFixed += $carFixed;
                            @endphp
                            <tr>
                                <td><strong>{{ $car->brand }} {{ $car->model }}</strong></td>
                                <td>{{ $car->quantity }}</td>
                                <td>{{ number_format($car->loan_cost) }} DH <span style="font-size: 0.75rem; color: var(--text-muted);">/car</span></td>
                                <td>{{ number_format($car->insurance_cost) }} DH <span style="font-size: 0.75rem; color: var(--text-muted);">/car</span></td>
                                <td><strong>{{ number_format($carFixed) }} DH</strong></td>
                            </tr>
                            @endforeach
                            <tr style="background: var(--bg-light); font-weight: 700; border-top: 2px solid var(--border-color);">
                                <td colspan="4" style="text-align: right;">Total Automated Fixed Cost:</td>
                                <td style="color: #ef4444; font-size: 1.1rem;">{{ number_format($totFixed) }} DH</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Right: Log Custom/Variable Expense -->
                <div class="panel">
                    <h2>Log Custom/Variable Expense</h2>
                    <form action="/{{ $locale }}/admin/expenses" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Expense Category</label>
                            <select name="category" required>
                                <option value="maintenance">Maintenance & Service</option>
                                <option value="fuel">Fuel & Gas</option>
                                <option value="loan">Extra Loan Payment</option>
                                <option value="insurance">Extra Insurance Fee</option>
                                <option value="other" selected>Other (Taxes, Cleaning, Parts...)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" placeholder="e.g. Brake pads replacement Dacia" required>
                        </div>
                        <div style="display: flex; gap: 1rem; align-items: flex-end;">
                            <div class="form-group" style="flex: 2;">
                                <label>Amount (DH)</label>
                                <input type="number" step="0.01" name="amount" placeholder="e.g. 450" required>
                            </div>
                            <div class="form-group" style="flex: 2;">
                                <label>Date Spent</label>
                                <input type="date" name="spent_at" value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="form-group" style="flex: 1; padding-bottom: 0.75rem;">
                                <label style="display: flex; gap: 0.5rem; align-items: center; cursor: pointer; font-size: 0.8rem; font-weight: 600;">
                                    <input type="checkbox" name="is_recurring" value="1" style="width: auto;"> Recurring?
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn-submit">Log Expense</button>
                    </form>
                </div>
            </div>

            <!-- Bottom: Custom/Variable Expenses Log -->
            <div class="panel" style="margin-top: 2rem;">
                <h2>Custom/Variable Expenses Log</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totCustomThisMonth = 0; @endphp
                        @foreach($expenses as $exp)
                        @php 
                            if ($exp->spent_at->format('Y-m') === date('Y-m')) {
                                $totCustomThisMonth += $exp->amount;
                            }
                        @endphp
                        <tr>
                            <td>{{ $exp->spent_at->format('Y-m-d') }}</td>
                            <td>
                                <strong>{{ $exp->description }}</strong>
                                @if($exp->is_recurring)
                                    <span style="font-size: 0.65rem; background: #e0f2fe; color: #0369a1; padding: 0.1rem 0.35rem; border-radius: 4px; font-weight: 700; margin-left: 0.5rem;">🔁 RECURRING</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge" style="background: #f1f5f9; color: var(--text-dark); text-transform: uppercase;">
                                    {{ $exp->category }}
                                </span>
                            </td>
                            <td><strong style="color: #ef4444;">{{ number_format($exp->amount) }} DH</strong></td>
                            <td>
                                <form action="/{{ $locale }}/admin/expenses/{{ $exp->id }}" method="POST" onsubmit="return confirm('Delete this expense entry?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:red; background:none; border:none; cursor:pointer; font-weight:600;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Summary Panel -->
                <div style="margin-top: 2.5rem; background: var(--bg-light); border-radius: 12px; padding: 1.5rem 2rem; display: flex; justify-content: space-between; align-items: center; border: 1px solid var(--border-color);">
                    <div>
                        <h3 style="font-size: 1.1rem; color: var(--primary-dark);">Budget Breakdown (Current Month)</h3>
                        <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.25rem;">
                            Fixed: <strong>{{ number_format($totFixed) }} DH</strong> | 
                            Variable: <strong>{{ number_format($totCustomThisMonth) }} DH</strong>
                        </p>
                    </div>
                    <div style="text-align: right;">
                        <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Combined Operating Budget</span>
                        <div style="font-size: 2rem; font-weight: 800; color: #ef4444; line-height: 1;">{{ number_format($totFixed + $totCustomThisMonth) }} DH</div>
                    </div>
                </div>
            </div>
        </div> <!-- End of expenses-tab -->

        <!-- tab 3: Reservation Log -->
        <div id="bookings-tab" class="tab-content" style="display: none;">
            <!-- Section 3: Booking Log -->
            <div class="panel" style="margin-bottom: 5rem;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 1.5rem;">
                <h2>Recent Reservation Log</h2>
                <button onclick="openManualBookingModal()" style="background:var(--primary-dark); color:white; border:none; padding:0.6rem 1.2rem; border-radius:6px; font-weight:700; cursor:pointer;">+ Add Manual Booking</button>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Ref</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Car</th>
                        <th>Pickup Date</th>
                        <th>Return Date</th>
                        <th>Total</th>
                        <th>Source</th>
                        <th>Status</th>
                        <th>Update Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td><code>{{ $booking->booking_reference }}</code></td>
                        <td>
                            {{ $booking->customer_name }}
                            @if($booking->extras && count($booking->extras) > 0)
                                <div style="display: flex; flex-wrap: wrap; gap: 0.2rem; margin-top: 0.25rem;">
                                    @foreach($booking->extras as $extra)
                                        <span style="font-size: 0.65rem; padding: 0.1rem 0.3rem; background: #e0f2fe; color: #0369a1; border-radius: 4px; font-weight: bold; text-transform: uppercase;">
                                            {{ $extra == 'insurance' ? 'CDW' : $extra }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </td>
                        <td><a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->customer_phone) }}" target="_blank">{{ $booking->customer_phone }}</a></td>
                        <td>{{ $booking->car ? $booking->car->brand . ' ' . $booking->car->model : 'Deleted Car' }}</td>
                        <td>{{ $booking->pickup_datetime->format('Y-m-d H:i') }}</td>
                        <td>{{ $booking->return_datetime->format('Y-m-d H:i') }}</td>
                        <td><strong>{{ number_format($booking->total_price) }} DH</strong></td>
                        <td>
                            <span class="badge badge-source-{{ $booking->source == 'website' ? 'web' : ($booking->source == 'whatsapp' ? 'whatsapp' : 'ota') }}">
                                {{ strtoupper($booking->source) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-{{ $booking->status }}">
                                {{ strtoupper($booking->status) }}
                            </span>
                        </td>
                        <td>
                            <div style="display:flex; gap:0.5rem; align-items:center;">
                                <form action="/{{ $locale }}/admin/bookings/{{ $booking->id }}/status" method="POST" style="display:flex; gap:0.25rem; margin:0;">
                                    @csrf
                                    <select name="status" style="padding: 0.2rem; font-size:0.75rem;">
                                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirm</option>
                                        <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancel</option>
                                    </select>
                                    <button type="submit" style="padding:0.2rem 0.4rem; font-size:0.75rem; background:#cbd5e1; border:none; cursor:pointer; border-radius:4px;">Go</button>
                                </form>
                                <button onclick="openEditBookingModal({{ json_encode($booking) }})" style="padding:0.20rem 0.5rem; font-size:0.75rem; background:#c5a059; color:white; border:none; cursor:pointer; border-radius:4px; font-weight:600; white-space:nowrap;">Edit Details</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div> <!-- End of bookings-tab -->

        <!-- tab 5: Contact Messages -->
        <div id="contacts-tab" class="tab-content" style="display: none;">
            <div class="panel" style="margin-bottom: 5rem;">
                <h2>Customer Contact Messages</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contactRequests as $req)
                        <tr>
                            <td>{{ $req->created_at->format('Y-m-d H:i') }}</td>
                            <td><strong>{{ $req->name }}</strong></td>
                            <td><a href="mailto:{{ $req->email }}">{{ $req->email }}</a></td>
                            <td>
                                @if($req->phone)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $req->phone) }}" target="_blank">{{ $req->phone }}</a>
                                @else
                                    <span style="color:var(--text-muted); font-style:italic;">None</span>
                                @endif
                            </td>
                            <td style="max-width: 350px; white-space: normal; word-wrap: break-word;">{{ $req->message }}</td>
                            <td>
                                <form action="/{{ $locale }}/admin/contact-requests/{{ $req->id }}" method="POST" onsubmit="return confirm('Delete this contact message request?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:red; background:none; border:none; cursor:pointer; font-weight:600;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($contactRequests->isEmpty())
                        <tr>
                            <td colspan="6" style="text-align: center; color: var(--text-muted); font-style: italic;">No contact requests yet.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div> <!-- End of contacts-tab -->


    </div>

    <!-- Edit Car Modal -->
    <div id="editCarModal" class="modal">
        <div class="modal-content">
            <button onclick="closeEditModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Edit Fleet Vehicle</h2>
            <form id="editCarForm" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label>Brand Name</label>
                    <input type="text" name="brand" id="edit_brand" required>
                </div>
                <div class="form-group">
                    <label>Model Name</label>
                    <input type="text" name="model" id="edit_model" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" id="edit_category">
                        <option value="Economy">Economy</option>
                        <option value="SUV">SUV</option>
                        <option value="Van">Van</option>
                        <option value="Luxury">Luxury</option>
                    </select>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Seats Count</label>
                        <input type="number" name="seats" id="edit_seats" min="2" max="15" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Transmission</label>
                        <select name="transmission" id="edit_transmission">
                            <option value="Manual">Manual</option>
                            <option value="Automatic">Automatic</option>
                        </select>
                    </div>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Fleet Quantity</label>
                        <input type="number" name="quantity" id="edit_quantity" min="1" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Base Price per Day (DH)</label>
                        <input type="number" name="base_price" id="edit_base_price" required>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.5rem;">
                    <label style="display:flex; gap:0.5rem; align-items:center; font-size: 0.8rem; font-weight:600; cursor:pointer;">
                        <input type="checkbox" name="ac" id="edit_ac" style="width:auto;"> Include AC
                    </label>
                    <label style="display:flex; gap:0.5rem; align-items:center; font-size: 0.8rem; font-weight:600; cursor:pointer;">
                        <input type="checkbox" name="allow_overbooking" id="edit_allow_overbooking" style="width:auto;"> Allow Overbooking (Overpass limits)
                    </label>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Model Year <span style="font-size:0.72rem; color:var(--text-muted);">(for inspection tracking)</span></label>
                        <input type="number" name="model_year" id="edit_model_year" min="2000" max="{{ date('Y') }}" placeholder="{{ date('Y') }}">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Model Month</label>
                        <select name="model_month" id="edit_model_month">
                            <option value="">— Select —</option>
                            @foreach(['Jan'=>1,'Feb'=>2,'Mar'=>3,'Apr'=>4,'May'=>5,'Jun'=>6,'Jul'=>7,'Aug'=>8,'Sep'=>9,'Oct'=>10,'Nov'=>11,'Dec'=>12] as $mn => $mv)
                            <option value="{{ $mv }}">{{ $mn }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Static Image URL path</label>
                    <input type="text" name="image_path" id="edit_image_path">
                </div>
                <div class="form-group">
                    <label>Hover MP4 Video URL path</label>
                    <input type="text" name="video_path" id="edit_video_path">
                </div>
                <div style="margin-top: 1rem; border-top: 1px solid var(--border-color); padding-top: 1rem;">
                    <h3 style="font-size: 0.9rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 0.75rem;">Monthly Operating Expenses (DH)</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-bottom: 1.5rem;">
                        <div class="form-group">
                            <label>Loan/Lease Fee</label>
                            <input type="number" name="loan_cost" id="edit_loan_cost" min="0">
                        </div>
                        <div class="form-group">
                            <label>Insurance Fee</label>
                            <input type="number" name="insurance_cost" id="edit_insurance_cost" min="0">
                        </div>
                        <div class="form-group">
                            <label>Service/Maintenance</label>
                            <input type="number" name="maintenance_cost" id="edit_maintenance_cost" min="0">
                        </div>
                        <div class="form-group">
                            <label>Fuel Cost</label>
                            <input type="number" name="fuel_cost" id="edit_fuel_cost" min="0">
                        </div>
                        <div class="form-group" style="grid-column: span 2;">
                            <label>Other Fees (Taxes, cleaning...)</label>
                            <input type="number" name="other_cost" id="edit_other_cost" min="0">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-submit">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- Add Manual Booking Modal -->
    <div id="manualBookingModal" class="modal">
        <div class="modal-content">
            <button onclick="closeManualBookingModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Add Manual Booking</h2>
            <form action="/{{ $locale }}/admin/bookings/manual" method="POST">
                @csrf
                <div class="form-group">
                    <label>Select Car Model</label>
                    <select name="car_id" required>
                        @foreach($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }} (Rate: {{ $car->base_price }} DH/day)</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" name="customer_name" required placeholder="e.g. John Doe">
                </div>
                <div class="form-group">
                    <label>Customer Email (Optional)</label>
                    <input type="email" name="customer_email" placeholder="e.g. john@example.com">
                </div>
                <div class="form-group">
                    <label>Customer Phone (WhatsApp preferred)</label>
                    <input type="tel" name="customer_phone" required placeholder="e.g. +212600988632">
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Pickup Location</label>
                        <input type="text" name="pickup_location" value="Marrakech Airport (RAK)" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Return Location</label>
                        <input type="text" name="return_location" value="Marrakech Airport (RAK)" required>
                    </div>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Pickup Date & Time</label>
                        <input type="datetime-local" name="pickup_datetime" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Return Date & Time</label>
                        <input type="datetime-local" name="return_datetime" required>
                    </div>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Total Price (DH)</label>
                        <input type="number" name="total_price" required placeholder="e.g. 1500">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Source</label>
                        <select name="source">
                            <option value="website">Website</option>
                            <option value="whatsapp" selected>WhatsApp</option>
                            <option value="ota">OTA (Agency)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Optional Extras & Add-ons</label>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem; background: #fafafa; padding: 0.75rem; border-radius: 6px; border: 1px solid var(--border-color); margin-bottom: 1rem;">
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="insurance" style="width:auto; cursor:pointer;"> Full Insurance (CDW)
                        </label>
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="gps" style="width:auto; cursor:pointer;"> GPS Navigation
                        </label>
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="child_seat" style="width:auto; cursor:pointer;"> Child Safety Seat
                        </label>
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="additional_driver" style="width:auto; cursor:pointer;"> Additional Driver
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Booking Status</label>
                    <select name="status">
                        <option value="pending">Pending</option>
                        <option value="confirmed" selected>Confirmed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit">Save Booking</button>
            </form>
        </div>
    </div>

    <!-- Edit Booking Modal -->
    <div id="editBookingModal" class="modal">
        <div class="modal-content">
            <button onclick="closeEditBookingModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Edit Booking Details</h2>
            <form id="editBookingForm" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label>Select Car Model</label>
                    <select name="car_id" id="edit_booking_car_id" required>
                        @foreach($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }} (Rate: {{ $car->base_price }} DH/day)</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" name="customer_name" id="edit_booking_customer_name" required>
                </div>
                <div class="form-group">
                    <label>Customer Email (Optional)</label>
                    <input type="email" name="customer_email" id="edit_booking_customer_email">
                </div>
                <div class="form-group">
                    <label>Customer Phone</label>
                    <input type="tel" name="customer_phone" id="edit_booking_customer_phone" required>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Pickup Location</label>
                        <input type="text" name="pickup_location" id="edit_booking_pickup_location" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Return Location</label>
                        <input type="text" name="return_location" id="edit_booking_return_location" required>
                    </div>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Pickup Date & Time</label>
                        <input type="datetime-local" name="pickup_datetime" id="edit_booking_pickup_datetime" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Return Date & Time</label>
                        <input type="datetime-local" name="return_datetime" id="edit_booking_return_datetime" required>
                    </div>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Total Price (DH)</label>
                        <input type="number" name="total_price" id="edit_booking_total_price" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Source</label>
                        <select name="source" id="edit_booking_source">
                            <option value="website">Website</option>
                            <option value="whatsapp">WhatsApp</option>
                            <option value="ota">OTA (Agency)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Optional Extras & Add-ons</label>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem; background: #fafafa; padding: 0.75rem; border-radius: 6px; border: 1px solid var(--border-color); margin-bottom: 1rem;">
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="insurance" id="edit_booking_extra_insurance" style="width:auto; cursor:pointer;"> Full Insurance (CDW)
                        </label>
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="gps" id="edit_booking_extra_gps" style="width:auto; cursor:pointer;"> GPS Navigation
                        </label>
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="child_seat" id="edit_booking_extra_child_seat" style="width:auto; cursor:pointer;"> Child Safety Seat
                        </label>
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="additional_driver" id="edit_booking_extra_additional_driver" style="width:auto; cursor:pointer;"> Additional Driver
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Booking Status</label>
                    <select name="status" id="edit_booking_status">
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit">Save Changes</button>
            </form>
        </div>
    </div>

    <script>
        const locale = "{{ $locale }}";

        function openEditModal(car) {
            document.getElementById('editCarForm').action = '/' + locale + '/admin/cars/update/' + car.id;
            document.getElementById('edit_brand').value = car.brand;
            document.getElementById('edit_model').value = car.model;
            document.getElementById('edit_category').value = car.category;
            document.getElementById('edit_seats').value = car.seats;
            document.getElementById('edit_transmission').value = car.transmission;
            document.getElementById('edit_quantity').value = car.quantity;
            document.getElementById('edit_base_price').value = car.base_price;
            document.getElementById('edit_image_path').value = car.image_path || '';
            document.getElementById('edit_video_path').value = car.video_path || '';
            
            // Checkboxes
            document.getElementById('edit_ac').checked = car.ac == 1;
            document.getElementById('edit_allow_overbooking').checked = car.allow_overbooking == 1;

            // Model year / month
            document.getElementById('edit_model_year').value = car.model_year || '';
            document.getElementById('edit_model_month').value = car.model_month || '';

            // Expenses
            document.getElementById('edit_loan_cost').value = car.loan_cost || 0;
            document.getElementById('edit_insurance_cost').value = car.insurance_cost || 0;
            document.getElementById('edit_maintenance_cost').value = car.maintenance_cost || 0;
            document.getElementById('edit_fuel_cost').value = car.fuel_cost || 0;
            document.getElementById('edit_other_cost').value = car.other_cost || 0;

            document.getElementById('editCarModal').style.display = 'flex';
        }

        function closeEditModal() {
            document.getElementById('editCarModal').style.display = 'none';
        }

        function openManualBookingModal() {
            document.getElementById('manualBookingModal').style.display = 'flex';
        }

        function closeManualBookingModal() {
            document.getElementById('manualBookingModal').style.display = 'none';
        }

        function openEditBookingModal(booking) {
            document.getElementById('editBookingForm').action = '/' + locale + '/admin/bookings/update/' + booking.id;
            document.getElementById('edit_booking_car_id').value = booking.car_id;
            document.getElementById('edit_booking_customer_name').value = booking.customer_name;
            document.getElementById('edit_booking_customer_email').value = booking.customer_email || '';
            document.getElementById('edit_booking_customer_phone').value = booking.customer_phone;
            document.getElementById('edit_booking_pickup_location').value = booking.pickup_location;
            document.getElementById('edit_booking_return_location').value = booking.return_location;
            
            // Format datetimes to YYYY-MM-DDTHH:mm local representation
            if (booking.pickup_datetime) {
                const pickup = new Date(booking.pickup_datetime);
                const offset = pickup.getTimezoneOffset();
                const localPickup = new Date(pickup.getTime() - (offset*60*1000));
                document.getElementById('edit_booking_pickup_datetime').value = localPickup.toISOString().slice(0, 16);
            }
            if (booking.return_datetime) {
                const ret = new Date(booking.return_datetime);
                const offset = ret.getTimezoneOffset();
                const localReturn = new Date(ret.getTime() - (offset*60*1000));
                document.getElementById('edit_booking_return_datetime').value = localReturn.toISOString().slice(0, 16);
            }
            
            const extras = booking.extras || [];
            document.getElementById('edit_booking_extra_insurance').checked = extras.includes('insurance');
            document.getElementById('edit_booking_extra_gps').checked = extras.includes('gps');
            document.getElementById('edit_booking_extra_child_seat').checked = extras.includes('child_seat');
            document.getElementById('edit_booking_extra_additional_driver').checked = extras.includes('additional_driver');
            
            document.getElementById('edit_booking_total_price').value = booking.total_price;
            document.getElementById('edit_booking_source').value = booking.source;
            document.getElementById('edit_booking_status').value = booking.status;
            
            document.getElementById('editBookingModal').style.display = 'flex';
        }

        function closeEditBookingModal() {
            document.getElementById('editBookingModal').style.display = 'none';
        }

        function openVisitsModal() {
            document.getElementById('visitsModal').style.display = 'flex';
        }

        function closeVisitsModal() {
            document.getElementById('visitsModal').style.display = 'none';
        }

        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
                btn.style.borderBottom = '3px solid transparent';
                btn.style.opacity = '0.75';
            });
            document.getElementById(tabId).style.display = 'block';
            
            const activeBtn = document.getElementById('btn-' + tabId);
            activeBtn.classList.add('active');
            activeBtn.style.borderBottom = '3px solid var(--accent-gold)';
            activeBtn.style.opacity = '1';
        }
        
        // Close modals on background click
        window.onclick = function(event) {
            const editModal = document.getElementById('editCarModal');
            const manualModal = document.getElementById('manualBookingModal');
            const visitsModal = document.getElementById('visitsModal');
            const editExtraModal = document.getElementById('editExtraModal');
            if (event.target == editModal) closeEditModal();
            if (event.target == manualModal) closeManualBookingModal();
            if (event.target == visitsModal) closeVisitsModal();
            if (event.target == editExtraModal) closeEditExtraModal();
        }

        // --- Revenue Month Filter ---
        const revenueData = @json($revenueByMonth);

        function updateRevenueDisplay() {
            const select = document.getElementById('revenueMonthFilter');
            const val = select.value;
            const display = document.getElementById('revenueDisplay');
            const sub = document.getElementById('revenueSubLabel');

            if (val === '3') {
                // Sum next 3 months (indices 0-2)
                const total = revenueData.slice(0, 3).reduce((sum, m) => sum + m.revenue, 0);
                display.innerText = total.toLocaleString('fr-FR') + ' DH';
                sub.innerText = revenueData.slice(0, 3).map(m => m.label).join(' + ');
            } else if (val === '6') {
                const total = revenueData.reduce((sum, m) => sum + m.revenue, 0);
                display.innerText = total.toLocaleString('fr-FR') + ' DH';
                sub.innerText = '6-month total projection';
            } else {
                const idx = parseInt(val);
                const m = revenueData[idx];
                display.innerText = m.revenue.toLocaleString('fr-FR') + ' DH';
                sub.innerText = m.label + ' — Confirmed bookings';
            }
        }

        // --- Edit Extra Modal ---
        function openEditExtraModal(extra) {
            document.getElementById('editExtraForm').action = '/' + locale + '/admin/extras/update/' + extra.id;
            document.getElementById('edit_extra_name').value = extra.name;
            document.getElementById('edit_extra_slug').value = extra.slug;
            document.getElementById('edit_extra_price').value = extra.price;
            document.getElementById('edit_extra_type').value = extra.type;
            document.getElementById('edit_extra_description').value = extra.description || '';
            document.getElementById('editExtraModal').style.display = 'flex';
        }

        function closeEditExtraModal() {
            document.getElementById('editExtraModal').style.display = 'none';
        }
    </script>

    <!-- Edit Extra Modal -->
    <div id="editExtraModal" class="modal">
        <div class="modal-content">
            <button onclick="closeEditExtraModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Edit Optional Extra</h2>
            <form id="editExtraForm" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label>Display Name</label>
                    <input type="text" name="name" id="edit_extra_name" required>
                </div>
                <div class="form-group">
                    <label>Slug (unique identifier)</label>
                    <input type="text" name="slug" id="edit_extra_slug" required>
                </div>
                <div style="display:flex; gap:1rem;">
                    <div class="form-group" style="flex:1;">
                        <label>Price (DH)</label>
                        <input type="number" name="price" id="edit_extra_price" min="0" step="0.01" required>
                    </div>
                    <div class="form-group" style="flex:1;">
                        <label>Charge Type</label>
                        <select name="type" id="edit_extra_type">
                            <option value="per_day">Per Day</option>
                            <option value="flat">Flat Fee</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description (Optional)</label>
                    <input type="text" name="description" id="edit_extra_description">
                </div>
                <button type="submit" class="btn-submit">Save Changes</button>
            </form>
        </div>
    </div>


    <!-- Visitor Logs Modal -->
    <div id="visitsModal" class="modal">
        <div class="modal-content" style="max-width: 700px;">
            <button onclick="closeVisitsModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Visitor Analytics</h2>
            
            <div style="display: flex; gap: 2rem; margin-bottom: 2rem;">
                <div style="flex: 1; background: var(--bg-light); padding: 1.2rem; border-radius: 8px; border: 1px solid var(--border-color);">
                    <h3 style="font-size: 0.95rem; margin-bottom: 1rem; color: var(--primary-dark);">Top 5 Countries</h3>
                    <table style="width: 100%; border-collapse: collapse;">
                        @foreach($topCountries as $tc)
                        <tr style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                            <td style="padding: 0.5rem 0; font-size: 0.85rem;"><strong>{{ $tc->country }}</strong></td>
                            <td style="padding: 0.5rem 0; font-size: 0.85rem; text-align: right; color: var(--accent-gold); font-weight:700;">{{ $tc->count }} visits</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <h3 style="font-size: 1rem; margin-bottom: 0.75rem; color: var(--primary-dark);">Recent Visit Log (Last 200)</h3>
            <div style="max-height: 250px; overflow-y: auto; border: 1px solid var(--border-color); border-radius: 8px;">
                <table style="width: 100%; border-collapse: collapse; font-size: 0.8rem;">
                    <thead style="position: sticky; top: 0; background: var(--primary-dark); color: white;">
                        <tr>
                            <th style="padding: 0.5rem; text-align: left;">IP Address</th>
                            <th style="padding: 0.5rem; text-align: left;">Country</th>
                            <th style="padding: 0.5rem; text-align: left;">Visited At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allVisits as $visit)
                        <tr style="border-bottom: 1px solid rgba(0,0,0,0.05); background: white;">
                            <td style="padding: 0.4rem 0.5rem;"><code>{{ $visit->ip_address }}</code></td>
                            <td style="padding: 0.4rem 0.5rem;">{{ $visit->country }}</td>
                            <td style="padding: 0.4rem 0.5rem; color: var(--text-muted);">{{ $visit->visited_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
