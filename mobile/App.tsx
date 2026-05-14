import { StatusBar } from 'expo-status-bar';

import { SafeAreaProvider, SafeAreaView } from 'react-native-safe-area-context';

import Home  from './src/screen/Home';

export default function App() {
  return (
    <>
      <StatusBar style="dark" />

      <SafeAreaProvider>
        <SafeAreaView>
          <Home />
        </SafeAreaView>
      </SafeAreaProvider>
    </>
  );
}
