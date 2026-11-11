import React from 'react';
import { createRoot } from 'react-dom/client';
import LanyardShowcase from './components/LanyardShowcase';

const mountLanyard = () => {
  const container = document.getElementById('lanyard-root');
  if (!container || container.dataset.mounted === 'true') return;
  container.dataset.mounted = 'true';

  const profile = {
    name: container.dataset.name || 'Bagus Setyo Nugroho',
    role: container.dataset.role || 'Informatics Student | Aspiring Software Developer',
    institution: container.dataset.institution || 'Universitas Internasional Semen Indonesia (UISI)',
    semester: container.dataset.semester || 'Semester 5',
    avatarUrl: container.dataset.avatarUrl || '/images/bagus-hero.jpg',
    aboutPhotoUrl: container.dataset.aboutPhotoUrl || '/images/bagus-about.jpg'
  };

  const root = createRoot(container);
  root.render(
    <React.StrictMode>
      <LanyardShowcase
        profile={profile}
        frontImage={container.dataset.frontImage || undefined}
        backImage={container.dataset.backImage || undefined}
        strapImage={container.dataset.strapImage || undefined}
      />
    </React.StrictMode>
  );
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', mountLanyard);
} else {
  mountLanyard();
}
