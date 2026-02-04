import { describe, it, expect } from 'vitest';
import { mount } from '@vue/test-utils';
import KPIStat from '../KPIStat.vue';

describe('KPIStat', () => {
  it('renders label, value, and trend text', () => {
    const wrapper = mount(KPIStat, {
      props: {
        label: 'Revenue',
        value: '$12,345',
        trend: '5% vs. last period',
        positive: true,
      },
    });

    expect(wrapper.text()).toContain('Revenue');
    expect(wrapper.text()).toContain('$12,345');
    expect(wrapper.text()).toContain('5% vs. last period');
  });
});
