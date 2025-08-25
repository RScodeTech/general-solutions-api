<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>General Solutions — Cadastro de Técnico</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Lucide (ícones) -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

  <!-- Top / Brand -->
  <div class="gs-nav py-3">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="gs-brand">
        <div class="logo">GS</div>
        <div>General Solutions</div>
      </div>
      <div class="d-none d-md-flex align-items-center gap-3">
        <span class="opacity-75">Marketplace de Serviços</span>
      </div>
    </div>
  </div>

  <div class="container my-5" style="max-width:980px">
    <div class="card gs-card">
      <!-- Stepper mini (sem Documentos; Serviços -> Profissões) -->
      <div class="stepper">
        <div class="step" data-active="true"><i data-lucide="user"></i> Dados</div>
        <div class="step"><i data-lucide="map-pin"></i> Localização</div>
        <div class="step"><i data-lucide="briefcase"></i> Profissões</div>
      </div>

      <div class="card-body p-4 p-lg-5">

        <!-- Alertas -->
        <div id="alertBox" class="alert d-none" role="alert"></div>

        <form id="technicianForm" enctype="multipart/form-data" novalidate>

          <div class="p-3 mb-4 border rounded bg-light">
            <h6 class="mb-1 d-flex align-items-center">
              <i data-lucide="map-pin" class="me-2"></i>
              Área de atuação
            </h6>
            <p class="mb-0 text-muted">
              Ao se cadastrar, sua área de atuação será definida como um 
              <strong>raio de 20 miles</strong> a partir do endereço informado.
            </p>
          </div>
          <!-- Dados Pessoais -->
          <div class="d-flex align-items-center gap-2 section-title">
            <span class="badge rounded-pill"><i data-lucide="user"></i> Dados Pessoais</span>
          </div>
          <div class="row g-3 mb-2">
            <div class="col-md-6">
              <label class="form-label">Nome Completo</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="user-round"></i></span>
                <input type="text" class="form-control" name="name" required placeholder="Ex.: Maria Silva" />
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Telefone</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="phone"></i></span>
                <input type="text" class="form-control" name="fone" required placeholder="(DDD) 90000-0000" />
              </div>
            </div>
          </div>

          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="mail"></i></span>
                <input type="email" class="form-control" name="email" required placeholder="email@exemplo.com" />
              </div>
            </div>
    

          <!-- Localização -->
          <div class="d-flex align-items-center gap-2 section-title">
            <span class="badge rounded-pill"><i data-lucide="map-pin"></i> Endereço base / Área de Atuação </span>
          </div>
          <div class="row g-3 mb-2">
            <div class="col-md-6">
              <label class="form-label">Estado</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="map"></i></span>
                <input type="text" class="form-control" name="state" required placeholder="Ex.: FL" />
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Cidade</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="building-2"></i></span>
                <input type="text" class="form-control" name="city" required placeholder="Ex.: Orlando" />
              </div>
            </div>
          </div>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label">Endereço</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="home"></i></span>
                <input type="text" class="form-control" name="address" required placeholder="Rua, número" />
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Complemento</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="sticky-note"></i></span>
                <input type="text" class="form-control" name="complement" placeholder="Apto, bloco, ref." />
              </div>
            </div>
          </div>

          <!-- Detalhes -->
          <div class="d-flex align-items-center gap-2 section-title">
            <span class="badge rounded-pill"><i data-lucide="file-text"></i> Detalhes</span>
          </div>
          <div class="row g-3 mb-4">
            <div class="col-12">
              <label class="form-label">Serviços prestados</label>
              <textarea class="form-control" name="description" rows="3" placeholder="Descreva os serviços que você realiza, experiência e alcance."></textarea>
              <div class="help mt-1">Dica: destaque tipos de serviços, anos de experiência e cidades atendidas.</div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Imagem</label>
              <input type="file" class="form-control" name="image" accept="image/*" />
              <div class="help mt-1">PNG/JPG até 5MB.</div>
            </div>
          </div>

          <!-- Profissões (multiselect) -->
          <div class="d-flex align-items-center gap-2 section-title">
            <span class="badge rounded-pill"><i data-lucide="briefcase"></i> Profissões</span>
          </div>

          <div class="mb-2">
            <p class="text-muted mb-2">Selecione até <strong>3</strong> profissões.</p>
            <div id="profissoes-container" class="row row-cols-1 row-cols-md-2 g-2">
              <!-- Cada item é um checkbox Bootstrap-like -->
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input profession-check" type="checkbox" value="Eletricista" id="prof-eletricista">
                  <label class="form-check-label" for="prof-eletricista">Eletricista</label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input profession-check" type="checkbox" value="Encanador" id="prof-encanador">
                  <label class="form-check-label" for="prof-encanador">Encanador</label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input profession-check" type="checkbox" value="Pintor" id="prof-pintor">
                  <label class="form-check-label" for="prof-pintor">Pintor</label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input profession-check" type="checkbox" value="Pedreiro" id="prof-pedreiro">
                  <label class="form-check-label" for="prof-pedreiro">Pedreiro</label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input profession-check" type="checkbox" value="Marceneiro" id="prof-marceneiro">
                  <label class="form-check-label" for="prof-marceneiro">Marceneiro</label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input profession-check" type="checkbox" value="Jardineiro" id="prof-jardineiro">
                  <label class="form-check-label" for="prof-jardineiro">Jardineiro</label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input profession-check" type="checkbox" value="Técnico de Ar Condicionado" id="prof-ar">
                  <label class="form-check-label" for="prof-ar">Técnico de Ar Condicionado</label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input profession-check" type="checkbox" value="Montador de Móveis" id="prof-montador">
                  <label class="form-check-label" for="prof-montador">Montador de Móveis</label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input profession-check" type="checkbox" value="Serralheiro" id="prof-serralheiro">
                  <label class="form-check-label" for="prof-serralheiro">Serralheiro</label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input profession-check" type="checkbox" value="Gesseiro" id="prof-gesseiro">
                  <label class="form-check-label" for="prof-gesseiro">Gesseiro</label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input profession-check" type="checkbox" value="Azulejista" id="prof-azulejista">
                  <label class="form-check-label" for="prof-azulejista">Azulejista</label>
                </div>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input profession-check" type="checkbox" value="Diarista" id="prof-diarista">
                  <label class="form-check-label" for="prof-diarista">Diarista</label>
                </div>
              </div>
            </div>
          </div>

          <!-- Ações -->
          <div class="d-flex align-items-center justify-content-between mt-3">
            <p class="footer-note m-0"><i data-lucide="lock"></i> Seus dados são enviados com segurança.</p>
            <button id="submitBtn" type="submit" class="btn btn-primary btn-lg rounded-pill px-4">
              <span class="spinner-border spinner-border-sm me-2 d-none" id="btnSpinner" aria-hidden="true"></span>
              Enviar cadastro
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Toast -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index:1080">
    <div id="gsToast" class="toast align-items-center text-bg-dark border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body" id="gsToastBody">Processando…</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Fechar"></button>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const API_URL = 'https://www.generalsolutionsclub.com/api/technicians';

    const form = document.getElementById('technicianForm');
    const alertBox = document.getElementById('alertBox');
    const submitBtn = document.getElementById('submitBtn');
    const btnSpinner = document.getElementById('btnSpinner');

    // Toast helper
    const toastEl = document.getElementById('gsToast');
    const toastBody = document.getElementById('gsToastBody');
    const toast = new bootstrap.Toast(toastEl);

    // Lucide
    document.addEventListener('DOMContentLoaded', () => { lucide.createIcons(); });

    function setLoading(loading){
      submitBtn.disabled = loading;
      btnSpinner.classList.toggle('d-none', !loading);
    }

    function showAlert(type, message){
      alertBox.className = `alert alert-${type}`;
      alertBox.textContent = message;
      alertBox.classList.remove('d-none');
    }

    function showToast(message){
      toastBody.textContent = message;
      toast.show();
    }

    // Limite de 3 profissões
    const MAX_PROF = 3;
    const checks = document.querySelectorAll('.profession-check');
    checks.forEach(chk => {
      chk.addEventListener('change', () => {
        const selected = document.querySelectorAll('.profession-check:checked');
        if (selected.length > MAX_PROF) {
          chk.checked = false; // desfaz o último que excedeu
          showToast(`Você pode selecionar no máximo ${MAX_PROF} profissões.`);
        }
      });
    });

    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      alertBox.classList.add('d-none');

      if(!form.checkValidity()){
        form.reportValidity();
        return;
      }

      // normaliza decimal com vírgula
      const distance = form.querySelector('[name="distance"]');
      if (distance && distance.value) distance.value = distance.value.replace(',', '.');

      const selectedProfs = Array.from(document.querySelectorAll('.profession-check:checked')).map(i => i.value);
      if (selectedProfs.length === 0) {
        showAlert('warning', 'Selecione ao menos 1 profissão.');
        return;
      }

      // Monta o FormData e converte profissões -> services[i][name]
      const formData = new FormData(form);

      // Remover chaves 'services[...][name]' se existirem (por segurança)
      // (varre e guarda para re-adicionar limpo)
      const toDelete = [];
      for (const [k] of formData.entries()) {
        if (k.startsWith('services[') && k.endsWith('][name]')) {
          toDelete.push(k);
        }
      }
      toDelete.forEach(k => formData.delete(k));

      // Adiciona as profissões como services[i][name]
      selectedProfs.slice(0, MAX_PROF).forEach((prof, idx) => {
        formData.append(`services[${idx}][name]`, prof);
      });

      try{
        setLoading(true);
        showToast('Enviando cadastro…');

        const resp = await fetch(API_URL, { method:'POST', body: formData });
        const contentType = resp.headers.get('content-type') || '';
        const payload = contentType.includes('application/json')
          ? await resp.json().catch(()=> ({}))
          : await resp.text();

        if(!resp.ok){
          const msg = typeof payload === 'string' ? payload : (payload.message || 'Não foi possível concluir o cadastro.');
          throw new Error(msg);
        }

        showAlert('success', 'Cadastro realizado com sucesso!');
        showToast('Tudo certo! Técnico cadastrado.');
        form.reset();

      }catch(err){
        console.error(err);
        showAlert('danger', 'Erro ao enviar: ' + err.message);
        showToast('Erro no envio. Verifique os campos.');
      }finally{
        setLoading(false);
        lucide.createIcons();
      }
    });
  </script>
</body>
</html>
