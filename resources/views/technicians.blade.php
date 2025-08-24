<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard - Técnicos | General Solutions</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="../style.css">

</head>
<body>

  <!-- Topbar -->
  <div class="gs-top py-3">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="gs-brand">
        <div class="logo">GS</div>
        <div>General Solutions</div>
      </div>
      <div class="d-none d-md-flex align-items-center gap-3">
        <span class="opacity-75">Dashboard de Profissionais</span>
      </div>
    </div>
  </div>

  <div class="container my-4 my-md-5">

    <!-- Título + ação -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-3">
      <h1 class="h3 m-0 d-flex align-items-center gap-2">
        <i data-lucide="bar-chart-3"></i> Dashboard — Técnicos
      </h1>
      <a href="/technicians-create" class="btn btn-primary rounded-pill">
        <i data-lucide="plus"></i> Novo Técnico
      </a>
    </div>

    <!-- Cards -->
    <div class="row g-3 g-md-4">
      <div class="col-md-4">
        <div class="gs-card p-4">
          <div class="metric">
            <div class="icon"><i data-lucide="users"></i></div>
            <div>
              <div class="value" id="total_users_skel">—</div>
              <small>Usuários</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="gs-card p-4">
          <div class="metric">
            <div class="icon"><i data-lucide="wrench"></i></div>
            <div>
              <div class="value" id="total_technicians_skel">—</div>
              <small>Técnicos</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="gs-card p-4">
          <div class="metric">
            <div class="icon"><i data-lucide="mouse-pointer-click"></i></div>
            <div>
              <div class="value" id="total_clicks_skel">—</div>
              <small>Cliques</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Destaque -->
    <div class="mt-4">
      <div class="highlight p-3 p-md-4 d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
          <div class="icon" style="width:42px;height:42px;border-radius:50%;display:grid;place-items:center;background:#fff3ef;color:var(--gs-primary)">
            <i data-lucide="crown"></i>
          </div>
          <div>
            <div class="fw-semibold">Técnico Destaque</div>
            <div class="text-muted small">Maior número de cliques</div>
          </div>
        </div>
        <div class="text-end">
          <div class="fw-bold" id="top_technician_name">—</div>
          <small class="text-muted">Cliques: <span id="top_technician_clicks">0</span></small>
        </div>
      </div>
    </div>

    <!-- Filtro -->
    <div class="filter-bar mt-4">
      <div class="row g-2 g-md-3 align-items-center">
        <div class="col-md-4">
          <div class="input-group">
            <span class="input-group-text bg-white"><i data-lucide="search"></i></span>
            <input id="q" type="search" class="form-control" placeholder="Buscar por nome, serviço…" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="input-group">
            <span class="input-group-text bg-white"><i data-lucide="map"></i></span>
            <input id="state" type="text" class="form-control" placeholder="Estado (ex.: FL)" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="input-group">
            <span class="input-group-text bg-white"><i data-lucide="building-2"></i></span>
            <input id="city" type="text" class="form-control" placeholder="Cidade (ex.: Orlando)" />
          </div>
        </div>
        <div class="col-md-2 d-grid">
          <button id="applyFilter" class="btn btn-outline-secondary">
            <i data-lucide="filter"></i> Filtrar
          </button>
        </div>
      </div>
    </div>

    <!-- Tabela -->
    <div class="table-wrap mt-4">
      <div class="table-responsive" style="max-height:60vh;">
        <table class="table align-middle mb-0">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Estado</th>
              <th>Cidade</th>
              <th>Telefone</th>
              <th>Email</th>
              <th>Serviços</th>
            </tr>
          </thead>
          <tbody id="technicians_table">
            <!-- Skeleton rows -->
            <tr>
              <td colspan="6">
                <div class="d-grid gap-2">
                  <div class="skeleton" style="height:16px;"></div>
                  <div class="skeleton" style="height:16px;"></div>
                  <div class="skeleton" style="height:16px;"></div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <p class="text-center text-muted small mt-3">Dados atualizados via API General Solutions</p>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const API_DASHBOARD = "https://www.generalsolutionsclub.com/api/dashboard"";
    const API_TECHS     = "https://www.generalsolutionsclub.com/api/technicians";

    const elUsers    = document.getElementById("total_users_skel");
    const elTechs    = document.getElementById("total_technicians_skel");
    const elClicks   = document.getElementById("total_clicks_skel");
    const elTopName  = document.getElementById("top_technician_name");
    const elTopClicks= document.getElementById("top_technician_clicks");
    const tbody      = document.getElementById("technicians_table");

    // Filtros
    const qInput     = document.getElementById('q');
    const stateInput = document.getElementById('state');
    const cityInput  = document.getElementById('city');
    const applyBtn   = document.getElementById('applyFilter');

    let rawTechnicians = [];

    function renderIcons(){ try{ lucide.createIcons(); } catch(_){} }

    function num(n){ return (n ?? 0).toLocaleString("pt-BR"); }

    function renderDashboard(data){
      elUsers.textContent  = num(data?.total_users);
      elTechs.textContent  = num(data?.total_technicians);
      elClicks.textContent = num(data?.total_clicks);
      elTopName.textContent   = data?.top_technician?.name ?? "—";
      elTopClicks.textContent = num(data?.top_technician?.clicks_count);
    }

    function techMatchesFilter(tech, {q, state, city}){
      const servNames = (tech?.services || []).map(s => s?.name || "").join(", ").toLowerCase();
      const hay = [
        tech?.name, tech?.email, tech?.fone, tech?.state, tech?.city, servNames
      ].map(v => (v || "").toString().toLowerCase()).join(" ");

      const qOK  = q ? hay.includes(q.toLowerCase()) : true;
      const stOK = state ? (tech?.state || "").toLowerCase().includes(state.toLowerCase()) : true;
      const ctOK = city ? (tech?.city  || "").toLowerCase().includes(city.toLowerCase())  : true;
      return qOK && stOK && ctOK;
    }

    function renderTable(techs){
      tbody.innerHTML = "";
      if(!techs?.length){
        tbody.innerHTML = `
          <tr><td colspan="6">
            <div class="empty">
              <i data-lucide="inbox"></i>
              <div class="mt-2">Nenhum técnico encontrado</div>
              <div class="small text-muted">Ajuste os filtros ou tente novamente.</div>
            </div>
          </td></tr>`;
        renderIcons();
        return;
      }

      techs.forEach(tech => {
        const services = (tech?.services || []).map(s => s?.name).filter(Boolean);
        const servicesHtml = services.length
          ? services.slice(0,3).map(s => `<span class="badge badge-soft rounded-pill me-1 mb-1">${s}</span>`).join('') +
            (services.length > 3 ? `<span class="badge text-bg-light rounded-pill">+${services.length-3}</span>` : '')
          : `<span class="text-muted">—</span>`;

        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${tech?.name ?? "—"}</td>
          <td>${tech?.state ?? "—"}</td>
          <td>${tech?.city ?? "—"}</td>
          <td>${tech?.fone ?? "—"}</td>
          <td>${tech?.email ?? "—"}</td>
          <td>${servicesHtml}</td>
        `;
        tbody.appendChild(tr);
      });
      renderIcons();
    }

    function applyFilter(){
      const filters = {
        q: qInput.value.trim(),
        state: stateInput.value.trim(),
        city: cityInput.value.trim()
      };
      const filtered = rawTechnicians.filter(t => techMatchesFilter(t, filters));
      renderTable(filtered);
    }

    applyBtn.addEventListener('click', applyFilter);
    [qInput, stateInput, cityInput].forEach(el => el.addEventListener('keydown', (e)=>{
      if(e.key === 'Enter'){ e.preventDefault(); applyFilter(); }
    }));

    async function loadData(){
      renderIcons();

      // Dashboard
      try{
        const r = await fetch(API_DASHBOARD);
        const j = await r.json();
        renderDashboard(j?.data || {});
      }catch(e){
        elUsers.textContent = elTechs.textContent = elClicks.textContent = "—";
        console.error("Erro dashboard:", e);
      }

      // Technicians
      try{
        const r = await fetch(API_TECHS);
        const j = await r.json();
        rawTechnicians = j?.data || [];
        renderTable(rawTechnicians);
      }catch(e){
        console.error("Erro técnicos:", e);
        tbody.innerHTML = `
          <tr><td colspan="6">
            <div class="error">
              <i data-lucide="alert-triangle"></i>
              <div class="mt-2">Erro ao carregar técnicos</div>
              <div class="small text-muted">Tente novamente mais tarde.</div>
            </div>
          </td></tr>`;
        renderIcons();
      }
    }

    document.addEventListener("DOMContentLoaded", loadData);
  </script>
</body>
</html>
