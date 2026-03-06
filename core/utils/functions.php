<?php
// Função de Dump & Die personalizada

function dd(...$vars)
{
    $backtrace = debug_backtrace();
    $line = $backtrace[0]['line'] ?? '0';

    echo '<style>
        .dd-container { background: #0f172a; color: #e2e8f0; padding: 0; font-family: "JetBrains Mono", monospace; border-radius: 12px; margin: 20px; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5); border: 1px solid #1e293b; overflow: hidden; }
        
        /* Ajuste das Tabs */
        .dd-nav { display: flex; background: #1e293b; border-bottom: 1px solid #334155; padding: 0 10px; }
        .dd-nav button { 
            background: none; 
            border: none; 
            color: #94a3b8; 
            padding: 15px 20px; 
            cursor: pointer; 
            font-size: 13px; 
            font-weight: 600; 
            transition: all 0.2s ease;
            border-bottom: 3px solid transparent; /* Reserva o espaço da borda */
            margin-bottom: -1px; /* Alinha com a borda do container */
        }
        
        /* Estado Ativo: A borda só aparece aqui */
        .dd-nav button.active { 
            color: #38bdf8; 
            border-bottom: 3px solid #38bdf8; 
            background: rgba(56, 189, 248, 0.05); 
        }
        
        .dd-nav button:hover:not(.active) { color: #f1f5f9; background: rgba(255,255,255,0.02); }

        .dd-tab-content { display: none; padding: 20px; max-height: 600px; overflow-y: auto; }
        .dd-tab-content.active { display: block; }
        
        /* Estilos Internos */
        .dd-dump-item { margin-bottom: 15px; background: #1e293b; border-radius: 8px; padding: 15px; border-left: 4px solid #6366f1; }
        pre { margin: 0; white-space: pre-wrap; color: #34d399; font-size: 13px; }
        .bt-row { padding: 10px; border-bottom: 1px solid #334155; font-size: 12px; }
        .bt-file { color: #38bdf8; font-weight: bold; }
        .bt-args { background: #0f172a; padding: 8px; border-radius: 4px; margin-top: 8px; font-size: 11px; color: #94a3b8; display: block; border: 1px solid #334155; }
    </style>';

    echo '<div class="dd-container">';

    // Navegação corrigida
    echo '<div class="dd-nav">
            <button onclick="openTab(event, \'dd-dump\')" id="defaultTab" class="tablinks active">Dump & Die</button>
            <button onclick="openTab(event, \'dd-trace\')" class="tablinks">Backtrace</button>
          </div>';

    // Conteúdo Dump
    echo '<div id="dd-dump" class="dd-tab-content active">';
    foreach ($vars as $var) {
        echo '<div class="dd-dump-item">';
        echo '<span style="color: #f472b6; font-size: 11px;">' . gettype($var) . '</span>';
        echo '<pre>' . htmlspecialchars(print_r($var, true)) . '</pre>';
        echo '</div>';
    }
    echo '</div>';

    // Conteúdo Backtrace
    echo '<div id="dd-trace" class="dd-tab-content">';
    foreach ($backtrace as $i => $step) {
        echo '<div class="bt-row">';
        echo '<span style="color: #475569;">#' . $i . '</span> ';
        echo '<span class="bt-file">' . ($step['file'] ?? 'internal') . '</span>';
        echo '<div style="color: #fbbf24; margin-top: 5px;">' . ($step['function'] ?? '') . '()</div>';

        if (!empty($step['args'])) {
            echo '<div class="bt-args"><strong>Args:</strong> ' . htmlspecialchars(substr(json_encode($step['args']), 0, 300)) . (strlen(json_encode($step['args'])) > 300 ? '...' : '') . '</div>';
        }

        echo '</div>';
    }
    echo '</div>';

    echo '</div>';

    // Script JS corrigido
    echo '<script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            
            // Esconde todos os conteúdos
            tabcontent = document.getElementsByClassName("dd-tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            
            // Remove a classe active de todos os botões
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            
            // Mostra a aba atual e adiciona a classe active ao botão
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>';

    die;
}
